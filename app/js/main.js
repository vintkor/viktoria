/*__________________________ Other scripts __________________________*/

$(document).ready(function(){
	/*------------------------------- Owl.Carousel -----------------------------*/

	$(".owl-carousel").owlCarousel({
	    loop: true,
	    lazyLoad: true,
	    autoplay: true,
	    autoplayTimeout: 3000,
	    autoplayHoverPause: true,
	    nav: true,
	    navText: ['&larr;', '&rarr;'],
	    responsive: {
	        1000: {
	            items: 1
	        }
	    }
	});
    
})




