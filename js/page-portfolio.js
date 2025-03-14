


$(document).ready(function() {


    function scrollToSection(direction) {
        console.log(direction)
        let $sections = $('.section'); // Select all sections
        let scrollPosition = $(".fullpage").scrollTop(); // Current scroll position
        let targetIndex = -1;

        $sections.each(function (index) {
            let sectionTop = $(this).offset().top;
            if (scrollPosition < sectionTop + $(this).outerHeight() / 2) {
                targetIndex = direction === 'next' ? index + 1 : index - 1;
                return false; // Exit loop when we find the first matching section
            }
        });

        if (targetIndex >= 0 && targetIndex < $sections.length) {
            $(".fullpage").animate({ scrollTop: $sections.eq(targetIndex).offset().top }, 1);
        }
           };
     //$('#fullpage').fullpage({
        //options here
     //    autoScrolling:true,
    //     scrollHorizontally: false,
    //     scrollBar:true,
    //     scrollingSpeed:400,
    //     scrollOverflow: false
    // });

   

    $('#fullpage').click(function(){

var clickY = event.clientY; // Get Y-coordinate of the click
    var screenHeight = $(window).height(); // Get the height of the viewport

       if ($(event.target).closest('a').length) {
        return; // Do nothing if a link is clicked
    }

    var y = $("#fullpage").scrollTop();  //your current y position on the page



    if (clickY > screenHeight / 2) {
      scrollToSection('next');
    } else {
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