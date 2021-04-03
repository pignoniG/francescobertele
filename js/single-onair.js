



$( document ).ready(
    function(){ 

  

 $("#onair-more").click(function(){
  
      $("#onair-description-container").toggleClass("blocked");
      $("#onair-description-container-dimmer").toggleClass("blocked");
      $(this).toggleClass("active");

      $("body").toggleClass("modal_open");
    }); 
    


    
});


