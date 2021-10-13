



$( document ).ready(
    function(){ 


     var $gallery = $('.main-carousel').flickity({
      // options
      cellAlign: 'center',
      contain: true,
      autoPlay: true,
      wrapAround: true,
      imagesLoaded: true,
      "pageDots": false,


    });


  $("#onair-ask_trustee").click(function(){
        $("#onair-trust-container").toggleClass("blocked");
        $("#onair-trust-container-dimmer").toggleClass("blocked");
        $("#onair-trust").toggleClass("active");

        $("body").toggleClass("modal_open");
    }); 
    $(".modal_control").click(function(){
        $(".blocked").removeClass("blocked");
        $(".blocked").removeClass("blocked");
        $("#onair-trust").removeClass("active");
        $("body").removeClass("modal_open");
    }); 





    var $captionT = $('.caption.title');
    var $captionN = $('.caption.number');

    var flkty = $gallery.data('flickity');
    
    $captionT.text( flkty.selectedElement.getAttribute("data-alt") ); 
    $captionN.text( flkty.selectedElement.getAttribute("data-number") );   

    
    $gallery.on( 'select.flickity', function() {
        // set image caption using img's alt
        // console.log('alt='+flkty.selectedElement.alt+' / url='+flkty.selectedElement.title);
        //console.log('alt='+flkty.selectedElement.title);
        $captionT.text( flkty.selectedElement.getAttribute("data-alt") ); 
        $captionN.text( flkty.selectedElement.getAttribute("data-number") ); 
        console.log(flkty.selectedElement.getAttribute("data-number")) ;                      
        // $caption.attr( 'href',flkty.selectedElement.title )
    });





    
});


