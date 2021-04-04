



$( document ).ready(
    function(){ 



  $(".modal_control").click(function(){
        $("#onair-description-container").toggleClass("blocked");
        $("#onair-description-container-dimmer").toggleClass("blocked");
        $("#onair-more").toggleClass("active");

        $("body").toggleClass("modal_open");
    }); 




    
});


