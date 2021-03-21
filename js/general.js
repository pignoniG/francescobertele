/* Set the width of the side navigation*/
function openBan() {

       document.getElementById("myBanner").classList.add("blocked");

    document.getElementById("banner-dimmer").classList.add("blocked");
    document.getElementById("container-disclaimer").classList.add("blocked");
}


/* Set the width of the side navigation to 0 */
function closeBan() {

    document.getElementById("myBanner").classList.remove("blocked");
    document.getElementById("banner-dimmer").classList.remove("blocked");
    document.getElementById("container-disclaimer").classList.remove("blocked");
}




$(document).ready(function() 
    { 
    	// Mouse position "cross"
		const cursor = document.querySelector('.cursor');

		document.addEventListener('mousemove', e => {
		  cursor.setAttribute("style", "top: " + (e.clientY) + "px; left: " + (e.clientX) + "px;")

		})

		//Mouse position text

		let mouseLog = document.querySelector('#mouse-log');
		document.addEventListener('mousemove', logKey);
		
		function logKey(e) {
		  mouseLog.innerText = `
		    X: ${e.clientX}, Y: ${e.clientY}`;
		}



    	$.get("http://ip-api.com/json?callback=?", function (response) {
    		$("#ip-log").html(response.query);
    	}, "jsonp");




		var current_href= String(window.location.href);

	   	$( ".menu-buttons a" ).each(function( index ) {

	   		var element_href= String($(this).attr('href'));

	   		if (element_href) {

  			if ( current_href.includes(element_href) ){

  				$(this).addClass("active");
		}}
	});


















    } 
); 

