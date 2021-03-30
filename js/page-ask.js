




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


      }

  			
		});   


    $("span.ask-nav ").click(function(){
      $("#sort-filter").toggleClass("open");
      });   

    $(window).scroll(function() {
      $("#sort-filter").removeClass("open");

    });

		$("button.ask-tab").click(function(){

      $("span.ask-nav ").text($(this).attr('data-textnav'));

      $('html, body').animate({
        scrollTop: $($(this).attr('data-targhet')).offset().top - 100
    }, 200);
  			window.location.hash =  $(this).attr('data-targhet');
  
		});    	

    	var hash = $(location).attr('hash');

    	if (hash == "") { $('[data-targhet="#themes"]').trigger('click'); }
    	else{ 			  $('[data-targhet="'+hash+'"]').trigger('click');}

      if (window.innerWidth > 1023) {

        $('[data-targhet="#sidebar_Specificity"]').trigger('click');
        $('[data-targhet="#sidebar_Specificit"]').trigger('click');
       
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

     


    } 
); 

