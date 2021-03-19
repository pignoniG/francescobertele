



$( document ).ready(
    function(){ 


     var $gallery = $('.main-carousel').flickity({
      // options
      cellAlign: 'left',
      contain: true,
      autoPlay: true,
      wrapAround: true,
      imagesLoaded: true,
      "pageDots": false,
      arrowShape: "M29.3,50l39.8,39.8l1.4-1.4L32.2,50l38.5-38.4l-1.4-1.4L29.3,50z"

    });





    var $captionT = $('.caption.title');
    var $captionN = $('.caption.number');

    var flkty = $gallery.data('flickity');
    
    $captionT.text( flkty.selectedElement.alt ); 
    $captionN.text( flkty.selectedElement.getAttribute("data-number") );   

    $downloadhd.attr('href',flkty.selectedElement.getAttribute("data-"));
    $gallery.on( 'select.flickity', function() {
        // set image caption using img's alt
        // console.log('alt='+flkty.selectedElement.alt+' / url='+flkty.selectedElement.title);
        //console.log('alt='+flkty.selectedElement.title);
        $captionT.text( flkty.selectedElement.alt ); 
        $captionN.text( flkty.selectedElement.getAttribute("data-number") );                        
        // $caption.attr( 'href',flkty.selectedElement.title )
    });





    
});


