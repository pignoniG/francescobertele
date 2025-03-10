/* Set the width of the side navigation*/

function openNav() {
     $(".sidenav-description").toggleClass("active");
     $("#about").toggleClass("active");
     

}

function openBan() {

       document.getElementById("myBanner").classList.add("blocked");

    document.getElementById("banner-dimmer").classList.add("blocked");
    document.getElementById("container-disclaimer").classList.add("blocked");
    $("body").addClass("modal_open");
}


/* Set the width of the side navigation to 0 */
function closeBan() {

    document.getElementById("myBanner").classList.remove("blocked");
    document.getElementById("banner-dimmer").classList.remove("blocked");
    document.getElementById("container-disclaimer").classList.remove("blocked");
    $("body").removeClass("modal_open");
}

const appHeight = () => {
    const doc = document.documentElement
    doc.style.setProperty('--app-height', `${window.innerHeight}px`)
}
window.addEventListener('resize', appHeight)
appHeight()



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
		  mouseLog.innerText = 'X: '+e.clientX+', Y: '+e.clientY;
		}

		//$.getJSON('https://ipapi.co/json/', function(data) {
	  		//$("#ip-log").html(data.ip);
		//});

    	



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



(function (window) {
    var last = +new Date();
    var delay = 100; // default delay

    // Manage event queue
    var stack = [];

    function callback() {
        var now = +new Date();
        if (now - last > delay) {
            for (var i = 0; i < stack.length; i++) {
                stack[i]();
            }
            last = now;
        }
    }

    // Public interface
    var onDomChange = function (fn, newdelay) {
        if (newdelay) delay = newdelay;
        stack.push(fn);
    };

    // Naive approach for compatibility
    function naive() {

        var last = document.getElementsByTagName('*');
        var lastlen = last.length;
        var timer = setTimeout(function check() {

            // get current state of the document
            var current = document.getElementsByTagName('*');
            var len = current.length;

            // if the length is different
            // it's fairly obvious
            if (len != lastlen) {
                // just make sure the loop finishes early
                last = [];
            }

            // go check every element in order
            for (var i = 0; i < len; i++) {
                if (current[i] !== last[i]) {
                    callback();
                    last = current;
                    lastlen = len;
                    break;
                }
            }

            // over, and over, and over again
            setTimeout(check, delay);

        }, delay);
    }

    //
    //  Check for mutation events support
    //

    var support = {};

    var el = document.documentElement;
    var remain = 3;

    // callback for the tests
    function decide() {
        if (support.DOMNodeInserted) {
            window.addEventListener("DOMContentLoaded", function () {
                if (support.DOMSubtreeModified) { // for FF 3+, Chrome
                    el.addEventListener('DOMSubtreeModified', callback, false);
                } else { // for FF 2, Safari, Opera 9.6+
                    el.addEventListener('DOMNodeInserted', callback, false);
                    el.addEventListener('DOMNodeRemoved', callback, false);
                }
            }, false);
        } else if (document.onpropertychange) { // for IE 5.5+
            document.onpropertychange = callback;
        } else { // fallback
            naive();
        }
    }

    // checks a particular event
    function test(event) {
        el.addEventListener(event, function fn() {
            support[event] = true;
            el.removeEventListener(event, fn, false);
            if (--remain === 0) decide();
        }, false);
    }

    // attach test events
    if (window.addEventListener) {
        test('DOMSubtreeModified');
        test('DOMNodeInserted');
        test('DOMNodeRemoved');
    } else {
        decide();
    }

    // do the dummy test
    var dummy = document.createElement("div");
    el.appendChild(dummy);
    el.removeChild(dummy);

    // expose
    window.onDomChange = onDomChange;
})(window);



