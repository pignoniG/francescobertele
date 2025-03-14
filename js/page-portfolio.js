
$.fn.inView = function(inViewType){
    var viewport = {};
    viewport.top = $(window).scrollTop();
    viewport.bottom = viewport.top + $(window).height();
    var bounds = {};
    bounds.top = this.offset().top;
    bounds.bottom = bounds.top + this.outerHeight();
    switch(inViewType){
      case 'bottomOnly':
        return ((bounds.bottom <= viewport.bottom) && (bounds.bottom >= viewport.top));
      case 'topOnly':
        return ((bounds.top <= viewport.bottom) && (bounds.top >= viewport.top));
      case 'both':
        return ((bounds.top >= viewport.top) && (bounds.bottom <= viewport.bottom));         
      default:     
        return ((bounds.top >= viewport.top) && (bounds.bottom <= viewport.bottom));        
    }
};


function scrollToSection(direction) {
        
    let scrollPosition = $('.fullpage').scrollTop(); // Current scroll position
    let targetIndex = 0;
   


    $('.scrollablebox').each( function(){


    
        if ($( this ).inView('topOnly')){
            // the element is visible, do something

            let indexID= parseInt($( this ).attr('id'));

            targetIndex = indexID - 1 

            if (direction === 'next') {
                 targetIndex = indexID +1
            }

            console.log("in view indexID",indexID);
            console.log("selected targetIndex",targetIndex);
            console.log("scrolling to",targetIndex);

            let offset = $("#"+targetIndex.toString()).offset().top + scrollPosition ;
                console.log(" offset  to", offset );

                 $('.fullpage').stop().animate({

                    scrollTop: offset}, 100, 'swing'); 

    
            return false;
            

        } 
    });




};


$(document).ready(function() {




   

    $('#fullpage').click(function(){

    var clickY = event.clientY; // Get Y-coordinate of the click
    var screenHeight = $(window).height(); // Get the height of the viewport

       if ($(event.target).closest('a').length) {
        return; // Do nothing if a link is clicked
    }




    if (clickY > screenHeight / 2) {
         event.preventDefault();
      scrollToSection('next');
    } else {
         event.preventDefault();
      scrollToSection('prev');
    }

});


    $(document).on("mousemove", function(event) {
        var screenHeight = $(window).height();
    
        if (event.clientY > screenHeight / 2) {
              $('#fullpage').css("cursor", "url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgdmlld0JveD0iMCAwIDEwMCAxMDAiPjxwYXRoIGQ9Ik0gMTAsNTAgTCA2MCwxMDAgTCA3MCw5MCBMIDMwLDUwICBMIDcwLDEwIEwgNjAsMCBaIiBmaWxsPSJyZWQiIHRyYW5zZm9ybT0icm90YXRlKC05MCwgNTAsIDUwKSIvPjwvc3ZnPg==') 16 16, auto"); // Down Arrow
    
           } else {
             $('#fullpage').css("cursor", "url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgdmlld0JveD0iMCAwIDEwMCAxMDAiPjxwYXRoIGQ9Ik0gMTAsNTAgTCA2MCwxMDAgTCA3MCw5MCBMIDMwLDUwICBMIDcwLDEwIEwgNjAsMCBaIiBmaWxsPSJyZWQiIHRyYW5zZm9ybT0icm90YXRlKDkwLCA1MCwgNTApIi8+PC9zdmc+') 16 16, auto"); // Up Arrow
     
            }
    });
});