(function($){

	"use strict";

	/* Animação menu hamburger
	---------------------------------------------------------------------------------- */
	var toggle = $(".c-hamburger");

	toggle.on( "click", function(e) {
		e.preventDefault();
		(this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
	});


	/* Efeito paralax no banner
	---------------------------------------------------------------------------------- */
	window.onscroll = function() {
		var $that = $('.banner');

		$(window).on( 'scroll', function(){
			$that.css('top', -window.scrollY * 0.2 + 'px');
		});
	}


	/* Altura do banner - home
	---------------------------------------------------------------------------------- */
	resizeWindow();
	function resizeWindow() {
		var altura = $(window).height();
		$('.title-banner').css('height', altura);
	}

	$(window).resize(function() {
		resizeWindow();
	});


})(jQuery);