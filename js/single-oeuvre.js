
$( document ).ready(
    function(){ 


  $("#button-shop-modal").click(function(){
        if (!$(this).hasClass( "sold" )) {
        $("#oeuvre-buy-container").toggleClass("blocked");
        $("#oeuvre-buy-container-dimmer").toggleClass("blocked");
        $("#button-shop-modal").toggleClass("active");
        $("body").toggleClass("modal_open");}
    }); 


    $(".modal_control").click(function(){
        $(".blocked").removeClass("blocked");
        $(".blocked").removeClass("blocked");
        $("#button-shop-modal").removeClass("active");
       
        $("body").removeClass("modal_open");
    }); 

    jQuery("#datasheet_h").on('click', function( event ){

  $(this).toggle();
  jQuery("#datasheet_s").toggle();
   $(".text-description-overflow").toggleClass("hidden");

  });

jQuery("#datasheet_s").on('click', function( event ){
  
  $(this).toggle();
  jQuery("#datasheet_h").toggle();
  $(".text-description-overflow").toggleClass("hidden");

  });

  $(".text-description-overflow").css("top", $(".oeuvre-header").height()+10);
if ($(window).width() < 1024) {$(".wpm-language-switcher.switcher-list").css("top", $(".oeuvre-header").height()-30);}
else {$(".wpm-language-switcher.switcher-list").css("top", "initial");}

});
 $(".text-description-overflow").css("top", $(".oeuvre-header").height()+10);
if ($(window).width() < 1024) {$(".wpm-language-switcher.switcher-list").css("top", $(".oeuvre-header").height()-30);}
else {$(".wpm-language-switcher.switcher-list").css("top", "initial");}


$(window).on('resize', function () {

    $(".text-description-overflow").css("top", $(".oeuvre-header").height()+10);
    if ($(window).width() < 1024) {$(".wpm-language-switcher.switcher-list").css("top", $(".oeuvre-header").height()-30);}
else {$(".wpm-language-switcher.switcher-list").css("top", "initial");}
$(".text-description-overflow").addClass("hidden");
jQuery("#datasheet_h").removeClass("active");
jQuery("#datasheet_h").hide();
jQuery("#datasheet_s").removeClass("active");
jQuery("#datasheet_s").show();
});