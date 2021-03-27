




$(document).mouseup(function(e) 
{
    var container = $("#sort-filter");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        $("#sort-filter").removeClass("open");
    }
});


(function( $ ){

  $.fn.fitText = function( kompressor, options ) {

    // Setup options
    var compressor = kompressor || 1,
        settings = $.extend({
          'minFontSize' : 16,
          'initFontSize' : 16,
          'maxFontSize' : 40,
        }, options);

    return this.each(function(){

      // Store the object
      var $this = $(this);

      // Resizer() resizes items based on the object width divided by the compressor * 10
      var resizer = function () {
        $this.css('font-size', settings.initFontSize);
        console.log($(window).height());



        var len  = $this.text().length;
        var calc = Math.sqrt( ($this.width() * ($(window).height()-300) )/len ) ;
    

        var min = Math.min(calc, parseFloat(settings.maxFontSize));

        var max = Math.max(min, parseFloat(settings.minFontSize));


        $this.css('font-size', max);

      };

      // Call once to set.
      resizer();

      // Call on resize. Opera debounces their resize by default.
      $(window).resize(resizer);

    });

  };

})( jQuery );



function myPopup(myURL, title, myWidth, myHeight) {
            var left = (screen.width - myWidth) / 2;
            var top = (screen.height - myHeight) / 2;
            var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
         }

$(document).ready(function() 
    { 

    	
		$("button.ask-sidebar").click(function(){

      if ($(this).hasClass("active") && window.innerWidth < 1024) {
        $("div.ask-themes").removeClass("visible");
        $("button.ask-sidebar").removeClass("active");

      }
      else{
        $("div.ask-themes").removeClass("visible");
        $("button.ask-sidebar").removeClass("active");
        $(this).addClass("active");


        $($(this).attr('data-targhet')).addClass("visible");


      }

      

  			
        
  			$(window).scrollTop(0);
		});   


    $("span.ask-nav ").click(function(){
      $("#sort-filter").toggleClass("open");
      });   

    $(window).scroll(function() {
      $("#sort-filter").removeClass("open");

    });

		$("button.ask-tab").click(function(){
   

        $("span.ask-nav ").text($(this).attr('data-textnav'));
  			$("div.ask-content").removeClass("visible");
  			$("button.ask-tab").removeClass("active")
  			$(this).addClass("active")
  			$($(this).attr('data-targhet')).addClass("visible")
  			window.location.hash =  $(this).attr('data-targhet');
        jQuery("#artistic_dir div").fitText();
        jQuery("#become-a-trustee div").fitText();
        jQuery("#biography div").fitText();
        
        $(window).scrollTop(0);
		});    	

    	var hash = $(location).attr('hash');

    	if (hash == "") { $('[data-targhet="#themes"]').trigger('click'); }
    	else{ 			  $('[data-targhet="'+hash+'"]').trigger('click');}

      if (window.innerWidth > 1023) {

        $('[data-targhet="#sidebar_Specificity"]').trigger('click');

      }



      const table = document.querySelector('table');

      let headerCell = null;
      
      for (let row of table.rows) {
        const firstCell = row.cells[0];
        
        if (headerCell === null || firstCell.innerText !== headerCell.innerText) {
          headerCell = firstCell;
        } else {
          headerCell.rowSpan++;
          firstCell.remove();
        }
      }

      jQuery("#artistic_dir div").fitText();
      jQuery("#become-a-trustee div").fitText();
      jQuery("#biography div").fitText();


    } 
); 

