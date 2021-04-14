




$(document).mouseup(function(e) 
{
    var container = $("#sort-filter");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        $("#sort-filter").removeClass("open");
    }
});


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
        var last_ask_sidebar =$(this); 

        if (window.innerWidth < 1024) {

        
        setTimeout(function(){ 


        $('html, body').stop().animate({
          'scrollTop': last_ask_sidebar.offset().top-50
          }, 200, 'swing', function () {});
        }, 300);}

        else{
          $('html, body').stop().animate({
          'scrollTop': 0
          }, 200, 'swing', function () {});
        }


      
  

     

    }

  			
		});   


    $("span.ask-nav ").click(function(){
      $("#sort-filter").toggleClass("open");
      });


    var lastElement="";


    $(window).scroll(function() {
      $("#sort-filter").removeClass("open");



      var topElement="_";
      var topOffset="1000000";

      $(".ask-content").each(function( index ) {

        var offset = $( this ).offset();
        var posY = offset.top - $(window).scrollTop();

        if (topOffset > Math.abs(posY)) {
            topElement = $( this );
            topOffset = Math.abs(posY)
        }  
      });

      

      if (topElement != lastElement) {
        var bottone= $('[data-targhet="#'+topElement.attr("id")+'"]')
        

        $("button.ask-tab").removeClass("active")
        bottone.addClass("active")


        $("span.ask-nav ").text(bottone.attr('data-textnav'));
         lastElement=topElement;

      }


    });



    $(".col-title").click(function(){

      $("div.bib_modal").removeClass("active");
      $("#"+$(this).attr('data-modal')).addClass("active");
      $("body").addClass("modal_open");
      
  
    });  


$("div.bib_modal").click(function(){
      event.stopPropagation();
      $("div.bib_modal").removeClass("active");
      $("body").removeClass("modal_open");
    }); 

  $("div.inner_modal").click(function(){
      event.stopPropagation();
    });

  
  $("a.close-modal").click(function(){
      event.stopPropagation();
      $("div.bib_modal").removeClass("active");
      $("body").removeClass("modal_open");
    }); 





		$("button.ask-tab").click(function(){

      $("span.ask-nav ").text($(this).attr('data-textnav'));
      $("button.ask-tab").removeClass("active")
      $(this).addClass("active")


      $('html, body').animate({
        scrollTop: $($(this).attr('data-targhet')).offset().top - 60
    }, 200);
  			window.location.hash =  $(this).attr('data-targhet');
  
		});    	

    if (window.innerWidth > 1023) {

        
        $('#sidebar_Specificity').addClass("visible");
        $('[data-targhet="#sidebar_specificity"]').addClass("active");

        $('#sidebar_Specificita').addClass("visible");
        $('[data-targhet="#sidebar_specificit"]').addClass("active");
       
      }

    	var hash = $(location).attr('hash');

    	if (hash == "") { $('[data-targhet="#themes"]').trigger('click'); }
    	else{ 			  $('[data-targhet="'+hash+'"]').trigger('click');}

      

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

     


    } 
); 

