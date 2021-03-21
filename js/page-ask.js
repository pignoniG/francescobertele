$(document).ready(function() 
    { 

    	
		$("button.ask-sidebar").click(function(){

  			$("div.ask-themes").removeClass("visible");
  			$("button.ask-sidebar").removeClass("active")
  			$(this).addClass("active")

  			$($(this).attr('data-targhet')).addClass("visible")
  			
		});   


		$("button.ask-tab").click(function(){
  			$("div.ask-content").removeClass("visible");
  			$("button.ask-tab").removeClass("active")
  			$(this).addClass("active")

  			$($(this).attr('data-targhet')).addClass("visible")
  			window.location.hash =  $(this).attr('data-targhet');
		});    	

    	var hash = $(location).attr('hash');
    	if (hash == "") { $('[data-targhet="#themes"]').trigger('click'); }
    	else{ 			  $('[data-targhet="'+hash+'"]').trigger('click');}

    } 
); 

