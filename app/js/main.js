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

	/*-------------------------------- Плавная анимация по меню ---------------------------------*/

	$(".bounce, #menu-item-9").on("click", "a", function(event) {
	    //отменяем стандартную обработку нажатия по ссылке
	    event.preventDefault();

	    //забираем идентификатор бока с атрибута href
	    var id = $(this).attr('href'),

	        //узнаем высоту от начала страницы до блока на который ссылается якорь
	        top = $(id).offset().top;

	    //анимируем переход на расстояние - top за 1500 мс
	    $('body,html').animate({
	        scrollTop: top
	    }, 800);
	});

	/*-------------------------------- Липкое меню ---------------------------------*/

	$('.headroom').headroom();
    
})




