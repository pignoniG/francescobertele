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


