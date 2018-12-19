// Alturas de Imágenes
$(document).ready(function() {
	let Height = $('body > #nosotros > img').height();
	$('body > #nosotros > img').css('margin-top', -Height);

	let MainHeight = $('body > main > img').height();
	$('body > main > img').css('margin-top', -MainHeight);

	// Slider
	$('.item-carousel-header:first-of-type').addClass('active');
});

// Navegación
$('.item-menu').on('click', function(event) {
	event.preventDefault();
	let Item = $(this).attr('href');
	
	if ($(window).width() < 1030) {
		$('body > button').removeClass('active-btn');
		$('body > nav').removeClass('active-nav');
		$('body > nav > section').removeClass('active-nav');
		
		$('body, html').stop(true, true).animate({
			scrollTop: $(Item).offset().top
		}, 1000);
	} else {
		$('body, html').stop(true, true).animate({
			scrollTop: $(Item).offset().top - 85
		}, 1000);
	}
});

$(window).scroll(function(event) {
	let wHeight = $(window).scrollTop();

	if (wHeight > 200) {
		$('body > nav').css('box-shadow', '0 0 1px rgba(0, 0, 0, 0.5)');
	} else {
		$('body > nav').css('box-shadow', 'none');
	}
});

// Navegación adaptable
if ($(window).width() < 1030) {
	$('body > button').on('click', function(event) {
		event.preventDefault();
		$(this).toggleClass('active-btn');
		$('body > nav').toggleClass('active-nav');
		$('body > nav > section').toggleClass('active-nav');
	});
}