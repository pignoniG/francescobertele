$( document ).ready(
    function(){ 



  $("#onair-more").click(function(){
        $("#onair-description-container").toggleClass("blocked");
        $("#onair-description-container-dimmer").toggleClass("blocked");
        $("#onair-more").toggleClass("active");
        $("body").toggleClass("modal_open");
    }); 


    $(".modal_control").click(function(){
        $(".blocked").removeClass("blocked");
        $(".blocked").removeClass("blocked");
        $("#onair-more").removeClass("active");
        $("#onair-trust").removeClass("active");
        $("body").removeClass("modal_open");
    }); 


  $("#onair-trust").click(function(){
        $("#onair-trust-container").toggleClass("blocked");
        $("#onair-trust-container-dimmer").toggleClass("blocked");
        $("#onair-trust").toggleClass("active");

        $("body").toggleClass("modal_open");
    }); 




    
});


