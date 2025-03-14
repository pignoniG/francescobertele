$(document).ready(function() {
    $('#fullpage').fullpage({
        //options here
        autoScrolling:true,
        scrollHorizontally: false,
        scrollBar:true,
        scrollingSpeed:4,
        scrollOverflow: false
    });

   

    $('#fullpage').click(function(){

var clickY = event.clientY; // Get Y-coordinate of the click
    var screenHeight = $(window).height(); // Get the height of the viewport

       if ($(event.target).closest('a').length) {
        return; // Do nothing if a link is clicked
    }


    if (clickY > screenHeight / 2) {
        fullpage_api.moveSectionDown(); // Click on bottom half
    } else {
        fullpage_api.moveSectionUp(); // Click on top half
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