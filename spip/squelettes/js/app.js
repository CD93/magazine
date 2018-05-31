// Object for global variables
var Vars = Vars || {};

// Default ease
TweenLite.defaultEase = Expo.easeOut;

// Global DOM variables which doesn't fit in `Vars`
var $document = $(document),
		$window = $(window),
		$html = $('html'),
		$body = $('body'),
		$htmlBody = $html.add($body);


/**
 * Global init function
 * @param  {string} parent 		segment_1 of the URL
 * @param  {string} child   	segment_2 of the URL
 */
App = function(parent, child) {
	'use strict';

	// Create new instance if function called withour `new`
	if (!(this instanceof App)) return new App(parent, child);
	var _ = this;

	Vars.parent = parent.length ? parent : 'home';
	Vars.child = child;



	/* ================================
	 * Dev stuff, to remove on prod
	 * ================================ */

	// Prevent scrollTop on click on a[href="#"] links
	$('a[href="#"]').on('click', function(e) {
		e.preventDefault();
	});

	/* ================================
	 * ./Dev stuff, to remove on prod
	 * ================================ */



	/* ================================
	 * Init global
	 * ================================ */

	// Smooth scroll for anchors link
	//$('a[href*=#]:not([href=#])').on('click', Utils.smoothScroll);

	// Cookies
	var $cookies = $('#js-cookies');

	if (Cookies.get('terms') !== 'accepted') {
		$cookies.addClass('is-visible');

		$('#js-cookies-btn').on('click', function() {
			TweenLite.to($cookies, 0.6, { className: '-=is-visible', onComplete: function() {
				$cookies.remove();
			} });
			// Set a cookie that expires in 1 year
			Cookies.set('terms', 'accepted', { expires : 365 });
			return false;
		});
	}

	// Vars.bLazy = new Blazy(bLazyOptions);


	$window.on({
		load: function() {
			// window load
		},
		// Create throttled events
		resize: Utils.addEndEvent,
		scroll: Utils.addEndEvent
	});

	$('.burger-menu').on('click', function(event){
		event.preventDefault();

		$('body').toggleClass('open-menu');
	})


	/* ================================
	 * ./Init global
	 * ================================ */



	 $window.load(function(){
		;(function() {
		            // Initialize
		            var bLazy = new Blazy();
		        })();
	 	$('.slider').each(function(index, element){

	 		var isAutoplay = $(element).data('autoplay'),
	 			speedAutoplay = $(element).data('speed'),
	 			arrow = $(element).data('arrow');

	 			if(arrow === undefined)
	 				arrow = false;

	 		$(element).slick({
	 			arrows : arrow,
				dots   : true,
				autoplay : isAutoplay,
				autoplaySpeed: speedAutoplay,
				nextArrow : '<i class="icon icon_arrow next"><svg viewBox="0 0 252.1 477.2" class="svg_arrow"><use xlink:href="squelettes/svg/sprite.svg#svg-arrow"></use></svg></i>',
				prevArrow : '<i class="icon icon_arrow prev"><svg viewBox="0 0 252.1 477.2" class="svg_arrow"><use xlink:href="squelettes/svg/sprite.svg#svg-arrow"></use></svg></i>'
	 		})
	 	});

		 $('.slider-for').slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  arrows: false,
			  fade: true,
			  asNavFor: '.slider-nav'
			});
			 
			$('.slider-nav').slick({
			  slidesToShow: 5,
			  slidesToScroll: 1,
			  asNavFor: '.slider-for',
			  centerMode: true,
			  focusOnSelect: true,
			  responsive: [
			    {
			      breakpoint: 1024,
				      settings: {
				        slidesToShow: 3
				      }
			    },
			    {
			      breakpoint: 640,
				      settings: {
				        slidesToShow: 3,
				        centerMode: false
				      }
			    }
			    // ,
			    // {
			    //   breakpoint: 420,
				   //    settings: {
				   //      slidesToShow: 1
				   //    }
			    // }
			    ]
			});
	});

	 console.log(Vars.parent);

	 var header_height = $('.main-header').height();

	 $window.on('scroll', function(event){

	 	var header_offscreen = $(this).scrollTop() > header_height;

	 	if(header_offscreen)
	 		$('.category-menu-scroll').addClass('show');
	 	else
	 		$('.category-menu-scroll').removeClass('show');

	 });

	/* ================================
	 * Init pages
	 * ================================ */

	Utils.hasMethod(Vars.parent, Vars.child);

	/* ================================
	 * ./Init page
	 * ================================ */

	return _;
};
