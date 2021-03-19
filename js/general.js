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

		//ip text

    	$.get("https://api.ipdata.co?api-key=test", function (response) {

  
    		$("#ip-log").html(response.ip);
    	}, "jsonp");














    } 
); 

