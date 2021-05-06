



$( document ).ready(
    function(){ 



  $("#button-shop-modal").click(function(){
        $("#oeuvre-buy-container").toggleClass("blocked");
        $("#oeuvre-buy-container-dimmer").toggleClass("blocked");
        $("#button-shop-modal").toggleClass("active");
        $("body").toggleClass("modal_open");
    }); 


    $(".modal_control").click(function(){
        $(".blocked").removeClass("blocked");
        $(".blocked").removeClass("blocked");
        $("#button-shop-modal").removeClass("active");
       
        $("body").removeClass("modal_open");
    }); 






    
});


