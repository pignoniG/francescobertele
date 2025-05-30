
$( document ).ready(
    function(){ 
onDomChange(function(){ 
   
        $('.wp-block-image img').not(".img-enlargeable").addClass('img-enlargeable').click(function() {
var src = $(this).attr('src');

  if ($(this).attr("srcset")) {
      src =$(this).attr("srcset").split(",").reduce(
        (acc, item) => {
          let [url, width] = item.trim().split(" ");
          width = parseInt(width);
          if (width > acc.width) return { width, url };
          return acc;
        },
        { width: 0, url: "" }
      ).url;

  }

  
  var modal;

  function removeModal() {
    modal.remove();
    $('body').off('keyup.modal-close');
  }
  modal = $('<div>').css({
    background: 'RGBA(0,0,0,.8) url(' + src + ') no-repeat center',
    backgroundSize: 'contain',
    width: '100%',
    height: '100%',
    position: 'fixed',
    zIndex: '10000',
    top: '0',
    left: '0',
    cursor: 'zoom-out'
  }).click(function() {
    removeModal();
  }).appendTo('body');
  //handling ESC
  $('body').on('keyup.modal-close', function(e) {
    if (e.key === 'Escape') {
      removeModal();
    }
  });
});

});



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

  $(".text-description-overflow").css("top", $(".oeuvre-header").height()+20);
  $("div.cell.conten_project_body").css("padding-top", $(".oeuvre-header").height()+20);
if ($(window).width() < 1024) {$(".wpm-language-switcher.wpm-switcher-list").css("top", $(".oeuvre-header").height()-30);}
else {$(".wpm-language-switcher.wpm-switcher-list").css("top", "initial");}

});
 $(".text-description-overflow").css("top", $(".oeuvre-header").height()+20);
 $("div.cell.conten_project_body").css("padding-top", $(".oeuvre-header").height()+20);
if ($(window).width() < 1024) {$(".wpm-language-switcher.wpm-switcher-list").css("top", $(".oeuvre-header").height()-30);}
else {$(".wpm-language-switcher.wpm-switcher-list").css("top", "initial");}


$(window).on('resize', function () {

    $(".text-description-overflow").css("top", $(".oeuvre-header").height()+20);
    $("div.cell.conten_project_body").css("padding-top", $(".oeuvre-header").height()+20);
    if ($(window).width() < 1024) {$(".wpm-language-switcher.wpm-switcher-list").css("top", $(".oeuvre-header").height()-30);}
else {$(".wpm-language-switcher.wpm-switcher-list").css("top", "initial");}
$(".text-description-overflow").addClass("hidden");
jQuery("#datasheet_h").removeClass("active");
jQuery("#datasheet_h").hide();
jQuery("#datasheet_s").removeClass("active");
jQuery("#datasheet_s").show();
});



