
// OPEN FILTERING SYSTEM JS —————————————————————————————————————————————

jQuery(document).ready(function(){





  // Quick Search Regex
  var qsRegex;
  // Filter Value
  var filterValue;
  // sortValue & whether to sortAscending
  var sortValue;
  var sortAscending;
  // griglia not initialize yet.
  var jQuerygriglia;
  // Last state of all the filters
  var lastState = {};

  /*
   * Parameter name for quicksearch, filter, and sort
   * Have this here so everything can easily be changed in one place.
   *
   */
  var quicksearchParamName = "search";
  var filterParamName = "filter";
  var sortValueParamName = "sort";
  var sortTypeParamName = "sorttype";
  

  /*
   * Regexes for grabbing values from hash parameter.
   *
   */
  var quicksearchRegex = RegExp(quicksearchParamName + '=([^&]+)', 'i');
  var filterRegex = RegExp(filterParamName + '=([^&]+)' , 'i');
  var sortValueRegex = RegExp(sortValueParamName + '=([^&]+)' , 'i');
  var sortTypeRegex = RegExp(sortTypeParamName + '=([^&]+)' , 'i');

  /*
   * This variable is for the setHash() function to communicate with
   * the filterWithHash() function.
   *
   * There isn't a need to build a hash string, update everything, and then
   * reinterprete that same hash string right after.
   *
   * Thus, there isn't a need to run setHash() and then let filterWithHash()
   * run on hash update.
   */
  var grigliaAlreadyUpdated = false;
  
  /*
   * Assiging filterElements here for easy modification.
   *
   * Currently the hash is something like this "filter=.XS.Jackets.Black"
   * It can always be changed to "filter=size:.XS+type:Jackets+color:black"
   * with some modification to the code.
   */
  var jQueryfilterElements = jQuery('.filter-select');
  /*
   * The preceding jQuery above mean that jQueryfilterElements is a jquery object.
   * The below filterElements is the array of all the elements
   * of jQueryfilterElements converted to jquery object.
   *
   * This was done like this so each time a select group is needed it doesn't
   * have to be converted to an object of jquery.
   */
  var filterElements = [];

  for ( let i = 0; i < jQueryfilterElements.length; i++ ){
    filterElements[i] = (jQuery(jQueryfilterElements[i]));
  }
  
  /*
   * Reset filter button, remove if not need.
   *
   */




jQuery("#accordionFilters").on('click', function( event ){
  $(this).toggleClass("active");
  $(".filter_panel").toggle();
  

  });

  jQuery("#btn-reset-filter").on('click', function( event ){
    jQueryfilterElements.prop('selectedIndex',0);
    jQueryfilterElements.prop('checked',0);
    // only trigger the event for one element.
    for (var i = filterElements.length - 1; i >= 0; i--) {
      filterElements[i].trigger("change");
    }

  });
  
  // use value of search field to filter
  var jQueryquicksearch = jQuery("#quicksearch").keyup(
    debounce(function() {
      setHash(1);
    })
  );
  // debounce so filtering doesn't happen every millisecond
  function debounce(fn, threshold) {
    var timeout;
    return function debounced() {
      if (timeout) {
        clearTimeout(timeout);
      }
      function delayed() {
        fn();
        timeout = null;
      }
      setTimeout(delayed, threshold || 100);
    };
  }
  
  /*
   * When any of the select field with class filter is change
   * we cycle through all the fields and grab all the values for each field
   * and concat them into the filterValue.
   *
   * Over here filterElements that is being used is the JQuery object.
   */





  jQueryfilterElements.on( 'change', function( event ) {
    filterValue = "";
    for ( let i = 0; i < jQueryfilterElements.length; i++ ){


      if ( jQueryfilterElements[i].selectedIndex > 0  || jQueryfilterElements[i].checked ) {
        filterValue += jQueryfilterElements[i].value;

      }

      

    }
 
    // Use set hash to update the jQuerygriglia and set the hash.
    setHash(2);


  });
  
  /*
   * change is-checked class on buttons
   * Only need one price-sort not two
   *
   */
  jQuery('#price-sort').on( 'change', function() {

      setHash(3, this);
  });

  function ceckRes(){
    if (document.body.clientWidth < 1024) {

      document.getElementById('btn-reset-filter').click();
      $(".filter_panel").hide();
      jQuery('#quicksearch').val("");
      qsRegex = new RegExp("", "gi");
      setHash(1);
      filterWithHash();

    }
  }
  
  function removeDisabled() {
    jQueryfilterElements.prop('disabled', false);
    jQuery('#quicksearch').prop('disabled', false);
    jQuery('#price-sort').prop('disabled', false);
  }
  
  function evidenziaTemi(){
      
      jQuery('snip').removeClass("selected");
      
      if (filterValue) {
        var snipClasses = filterValue.split('.');
        for (var i = snipClasses.length - 1; i >= 0; i--) {
          if (snipClasses[i]!= "") {
          
          jQuery('snip'+"."+snipClasses[i]).addClass("selected");}
        }
        
      }
      

  }
  
  function getHashFilter() {
    // get filter=filterName
    var matches = location.hash.match( filterRegex );
    var hashFilter = matches && matches[1];
    return hashFilter && decodeURIComponent( hashFilter );
  }
  
  function getSearchFilter() {
    // get search=filterName
    var matches = location.hash.match( quicksearchRegex );
    var searchFilter = matches && matches[1];

    return searchFilter && decodeURIComponent( searchFilter );
  }
  
  /*
   * Get the sort param. This function will always return an array with
   * 2 indexes. If both sortValue and sortType is found then it will return
   * the values for both. Value is index 1, and type is index 2.
   *
   * For everything else, this function will return [null, null].
   */
  function getSortParam() {
    var valueMatches = location.hash.match( sortValueRegex );
    var typeMatches = location.hash.match( sortTypeRegex );
    var v = valueMatches && valueMatches[1];
    var t = typeMatches && typeMatches[1];
  
    if ( v && t ) return [decodeURIComponent( v ), decodeURIComponent( t )];
    return [ null, null ];
  }
  
  /*
   * This function will set the hash when one of the filtering field is
   * changed.
   *
   * Parameter whocall is utilize to know who is the caller. There can only
   * be one caller at a time. Whocall is utilize as int because comparing
   * int is much faster than comparing string.
   *
   * whocall(1) = quicksearch
   * whocall(2) = filter
   * whocall(3) = sorting
   *
   * In a secure environment any other whocall besides the 3 above should
   * generate an error.
   */
  function setHash ( whocall, obj ){
    var hashes = {};
    var hashStr = "";
    if ( location.hash ){
        /*
         * forEach can be uitlized here, but this provide better cross platform
         * compatibitliy.
         *
         */
      let temp = location.hash.substr(1).split("&");
      for ( let i = 0; i < temp.length; i++ ){
        let param = temp[i].split("=");
        // if param[0] is 0 length that is an invalid look something like &=abc.
        if ( param[0].length === 0 ) continue;
        /*
         * if more than > 2 that is also invalid but just grab the first one anyway.
         * if exactly 1 that is something like &filter=&somethingelse. So that is an
         * empty param.
         *
         */
          let value = param.length > 1? param[1] : '';
          // This does not check if a url receive the same parameter multiple times.
          hashes[param[0]] = value;
        }
      }
  
    /*
     * If there is a quicksearch value assign that to the hashes object.
     * If not delete quicksearch name from the hashes object if there is.
     * With this way, if there was a value for quicksearch in the hash
     * object, it will just get overwritten. If not that index will be create.
     * The delete statement is just for cosmetic. This we turn the url back
     * to without hashes if there isn't a value.
     * However, for faster code, this can simply be done as
     *
     *   hashes[quicksearchParamName] = jQuery("#quicksearch").val()
     *
     * If do like the above, whether if there is a value or not, the hash
     * parameter for quicksearch will always be built.
     *
     */
    if ( whocall === 1 ){
      // 1 : quicksearch
      if ( jQuery("#quicksearch").val() ) hashes[quicksearchParamName] = encodeURIComponent(jQuery("#quicksearch").val());
      else delete hashes[quicksearchParamName];
      qsRegex = new RegExp(jQuery("#quicksearch").val(), "gi");
      /*
       * For lastState, if setup correctly, val will give an empty string
       * or something here.
       *
       */
      lastState["searchFilter"] = jQuery("#quicksearch").val();
    } else if ( whocall === 2 ){
      // 2 : filter
      /*
       * If done correctly there will always be a filter value when the user
       * choose an option
       *
       */
      hashes[filterParamName] = encodeURIComponent(filterValue);
      lastState["filterValue"] = filterValue;
    } else {
      // 3 : price sort
      /*
       * If from user selecting, without an option for resetting. If done
       * correctly, there will always be a sortValue and sortType.
       *
       */
      lastState["sortValue"] = sortValue = obj.value;
      lastState["sortType"] = obj.selectedOptions[0].getAttribute('data-sorttype');
      hashes[sortValueParamName] = encodeURIComponent(obj.value);
      hashes[sortTypeParamName] = obj.selectedOptions[0].getAttribute('data-sorttype');
      sortAscending = hashes[sortTypeParamName] === "asc"? true : false;
    }
  
    /*
     * If the fields are not disabled then update the griglia if griglia already intialized.
     * Otherwise, the initializer will do that. For that use the code in this comment
     * instead.
     *
     * if ( jQuerygriglia ) jQuerygriglia.isotope({ sortBy: sortValue , sortAscending: sortAscending});
     */
    jQuerygriglia.isotope({ sortBy: sortValue , sortAscending: sortAscending});
    /*
     * Update the hash without making filterWithHash() update the griglia.
     * Join everything in hashes together into a string. Always append &
     * after a key. But when assign to "location.hash", remove the last
     * character(extra &) from the string.
     *
     */
    for ( const k in hashes ) hashStr += k + "=" + hashes[k] + "&";
    grigliaAlreadyUpdated = true;
    location.hash = hashStr.substr(0, hashStr.length - 1);


  }
  
  /*
   * This function below can be customize to utilize not just only hashes
   * but also "Get Requests"
   *
   */
  function filterWithHash() {


    // If the griglia is already updated, there is nothing to do.
    if ( grigliaAlreadyUpdated ) {
        grigliaAlreadyUpdated = false;
        return;
    }

    var hashFilter = getHashFilter();
    var searchFilter = getSearchFilter();
    var sortParam = getSortParam();
    /*
     * If the last time we access the value for the filters and it
     * is the same at this time. There isn't a point to re-execute the code
     */
    if ( jQuerygriglia && lastState["searchFilter"] === searchFilter
               && lastState["filterValue"] === hashFilter
               && lastState["sortValue"] === sortParam[0]
               && lastState["sortType"] === sortParam[1] ) {
        return;
    }
  
    lastState["sortValue"] = sortParam[0];
    lastState["sortType"] = sortParam[1];
    lastState["searchFilter"] = searchFilter;
    /*
     * Note that the lastState["filterValue"] for here is
     * the string value of hash filter and not the actual
     * processed filterValue.
     *
     */
    lastState["filterValue"] = hashFilter;
  
    /*
     * If searhFilter is there, utilize it.
     * Else, qsRegex is reset. That is because the user could input a value into the
     * search field and then later delete that value then press enter. If that happen
     * and we don't reset the field, the result will not be reset.
     *
     * The same goes for hashFilter below, it is just easier to use this as an example.
     */
    if ( searchFilter ) {
        jQuery('#quicksearch').val(searchFilter);
        qsRegex = new RegExp(searchFilter, "gi");
    } else {
        // searchhash could be null and that is not fine with RegExp.
        // Hence, we give it an empty string.
        jQuery('#quicksearch').val("");
        qsRegex = new RegExp("", "gi");
    }
  
    /*
     * Refer to comment of searchFilter right above
     *
     * This will split the hash string by the "." and then check for their values.
     * If they are valid, it will set the filter value by the valid one. It will
     * disregard all the invalid.
     *
     * This search is based on the filterElements. For each filterElements,
     * the code will search for a match in the split array. If that is found,
     * that value is added to the filterValue string.
     *
     * Therefore, any duplicate will not be taken into consideration.
     * Duplicates only can become a problem if values between each filterElements
     * are not unique in nature.
     */

    if ( hashFilter ) {
      hashFilter = hashFilter.split(/(?=\.)/);
      filterValue = "";
      for ( let i = 0; i < filterElements.length; i++ ){
        let foundedValue = false;
        /*
         * This will search through the entire splitted hash array. But can
         * be done to search at maximum the same amount of filterElements
         * that are available.
         *
         * Note that, this does not check or prop the All select field
         * as that field now does not contain any values.
         *
         * Also how many index turned to null can be keep tracked of. That
         * is because if there are 2 indexes and both turned to null but there
         * are 20 filter elements then There is no point executing the code
         * for the other 18 elements.
         *
         * However, for a smaller amount of filter elements, keeping track
         * of how many elements turned to null may create an overhead cost.
         */


            console.log(hashFilter)

        for ( let j = 0; j < hashFilter.length; j++ ){
          if ( hashFilter[j] === null ) continue;

  

          if (filterElements[i].is("input"+hashFilter[j].slice(0, -2)) ) {
            filterElements[i].prop('checked',1);

            filterValue += hashFilter[j];
            hashFilter[j] = null;

             foundedValue = true;
          }

          let selectValue = filterElements[i].find('option[value="'+ hashFilter[j] +'"]');


          
          /*
           * If selectValue is found then select the value in the element
           * and add that value to the filterValue string.
           *
           * One a value is founded and used, that value will be turned
           * to null and will not be reused.
           *
           * Make sure the value of each select group is unique.
           */
          if ( selectValue.length > 0 ){
            selectValue.prop('selected', 'selected');
            filterValue += hashFilter[j];
            hashFilter[j] = null;
            foundedValue = true;
            break;


          }
        }
        /*
         * If the hash string did not contain a value for this element,
         * prop selected index 0(reset the select field).
         *
         */
        if ( foundedValue === false ) filterElements[i].prop('selectedIndex',0);
      }
  
      /*
       * If after cycle through the hash above and filterValue's length is still 0
       * then a default value will be prop for everything.
       *
       * Notice the changes here, where jQueryfilterElements that is being used
       * is preceding with the jQuery.
       */
      if ( filterValue.length === 0 ) jQueryfilterElements.prop('selectedIndex',0);
    } else {
      // filterValue will become null or empty whichever. But that is fine.
      filterValue = hashFilter;
      jQueryfilterElements.prop('selectedIndex',0);
    }
  
    /*
     * getSortParam will always return two index. It just whether if they both have
     * values or both null.
     *
     * If sortParam is [null, null] or its values are invalid. Turn sortValue and
     * sortAscending to null.
     *
     * If sortParam is [null, null] prop the default select for select group
     * with the id price-sort.
     */
    if ( sortParam[0] ){
      // search price sort select group to see if the hash is valid.
      var sortObj = jQuery('#price-sort').find('option[value="'+ sortParam[0] +'"][data-sorttype="'+ sortParam[1] +'"]');
      // If hash is valid prob the field
      // Else reset the field
      if ( sortObj.length > 0 ){
        sortObj.prop('selected', true);
        sortValue = sortParam[0];
        sortAscending = sortParam[1] === "asc"? true : false;
      } else {
        sortValue = null;
        sortAscending = null;
        jQuery('select[id="price-sort"]').prop('selectedIndex', 0);
      }
    } else {
      sortValue = null;
      sortAscending = null;
      jQuery('select[id="price-sort"]').prop('selectedIndex', 0);
    }
  
    if ( !jQuerygriglia ) {
      jQuery("select").select2({ minimumResultsForSearch: -1 });
      jQuerygriglia = jQuery(".ouvre-grid").isotope({
                itemSelector: ".ouvre_project_box",
                layoutMode: "masonry",
                getSortData: {
                  price: '.t-price parseInt',
                  category: '[data-category]',
                  dateAdded: function( itemElem ){
                    // Sort by date: return the timestamp of dateAdded.
                    return new Date(jQuery(itemElem).find('.dateAdded').text()).getTime();
                  },
                    /*
                     * Sort by item with class New.
                     * If the item contain class New, it will be assigned with a value of 0.
                     * Else, it will be assigned with a value of 1.
                     *
                     * There shouldn't be a sort descending for New. A field like that
                     * wasn't configured. Therefore, hash wouldn't be able to sort
                     * New in a descending way.
                     */
                  New: function( itemElem ){
                    return jQuery(itemElem).hasClass('New')? 0 : 1;
                  }
                },
                sortBy: sortValue ,
                sortAscending: sortAscending,
                filter: function() {
                  evidenziaTemi();
                  /* Note that current filtering using class name. */
                  var jQuerythis = jQuery(this);
                  var searchResult = qsRegex ? jQuerythis.text().match(qsRegex) : true;
                  var selectResult = filterValue ? jQuerythis.is(filterValue) : true;
                  return searchResult && selectResult;

                }
              });



    } else jQuerygriglia.isotope({ sortBy: sortValue , sortAscending: sortAscending});
  }
  
  jQuery('.griglia').imagesLoaded( function() {
    filterWithHash();
    evidenziaTemi();
    jQuery('.griglia').isotope('layout');

    jQuery(window).on( 'hashchange', filterWithHash );


    removeDisabled();
    ceckRes();

  });


jQuery('.griglia').imagesLoaded().progress( function() {
  jQuery('.griglia').isotope('layout');
});  



$(window).resize(function() {
   ceckRes();
});



});


// CLOSE FILTERING SYSTEM JS —————————————————————————————————————————————
