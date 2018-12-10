$(function() {

	$('.form .form-control').click(function(e) {
		e.preventDefault();
		$(this).closest('.form-group').addClass('is-focus');
	});

	$('.form .form-control').focusout(function(e) {
		e.preventDefault();
		var inputText = $(this).val();
		if (inputText === '') { $(this).closest('.form-group').removeClass('is-focus'); return; }
	});

	$(".js-imgTobg").each(function(){
		$(this).children("img").css("display", "none");
		var imgSrc = $(this).children("img").attr("src");
		$(this).css("background-image", "url('"+imgSrc+"')");
	});

	$(".js-scroll-to").bind("click", function (e) {
		var anchor = $(this);
		$('body').addClass('is-scrolling');
		$('html, body').stop().animate({
			scrollTop: $(anchor.attr('href')).offset().top - 50
		}, 500);

		if ( $(this).closest('.catalog').length > 0 ) {
			$(this).closest('.catalog').find('li').removeClass('active');
			$(this).closest('li').addClass('active');
			setTimeout(function () {
				$('.catalog').removeClass('is-open');
				$('body').removeClass('is-scrolling');
			}, 500);
		}

		e.preventDefault();
		return false;
	});

	if ($('.catalog').length > 0) {
		var $window = $(window), // Основное окно
				$target = $(".catalog"), // Блок, который нужно фиксировать при прокрутке
				$h = $target.offset().top - 1; // Определяем координаты верха нужного блока (например, с навигацией или виджетом, который надо фиксировать)

		$window.on('scroll', function () {
			// Как далеко вниз прокрутили страницу
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

			// Если прокрутили скролл ниже макушки нужного блока, включаем ему фиксацию
			if (scrollTop > $h) {
				$target.addClass("is-fixed");
				// Иначе возвращаем всё назад
			} else {
				$target.removeClass("is-fixed");
			}
		});

		$window.scroll(function () {
			var max = 0;
			var el = false;
			var list = {};

			$('.catalog .catalog-list li a').each(function (index, val) {
				var id = $(this).attr('href');
				if ('#' != id) {
					list[index] = $(id);
				}
			});

			$.each(list, function (index, elem) {
				if (Object.keys(elem).length == 0) {
					console.log('Один из указанных блоков в атрибуте href не найден!');
					return false;
				}
				if (elem.offset().top - 400 < $(window).scrollTop()) {
					if (max < elem.offset().top) {
						max = elem.offset().top;
						el = elem.prop('id')
					}
				}
			});
			if (!$('body').hasClass('is-scrolling')) {
				if (!max) {
					$('.catalog .catalog-list li.active').removeClass('active');
					$('.catalog .catalog-list li:first-child').addClass('active');
				} else {
					if (el != '') {
						$('.catalog .catalog-list li.active').removeClass('active');
						$('.catalog .catalog-list li a[href="#' + el + '"]').parent().addClass('active');
					}
				}
			}

		});
	}

	if ($(window).scrollTop() === 0) {
		if ($('.wow').length > 0) {
			var wow = new WOW({
				boxClass: 'wow', // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset: 0, // distance to the element when triggering the animation (default is 0)
				mobile: true, // trigger animations on mobile devices (default is true)
				live: true, // act on asynchronously loaded content (default is true)
				callback: function (box) {

				},
				scrollContainer: null // optional scroll container selector, otherwise use window
			});
			wow.init();
		}
	}

	$('.header .hamburger, .mmenu .hamburger').click(function(e) {
		e.preventDefault();
		$('body').toggleClass('mmenu-is-open');
	});

	$('.catalog .hamburger').click(function(e) {
		e.preventDefault();
		$(this).closest('.catalog').toggleClass('is-open');
	});

	$('.body-shadow').click(function(e) {
		e.preventDefault();
		$('body').removeClass('mmenu-is-open');
	});


	
















	
	function checkResizing() {
		let mediaQuery = document.body.clientWidth;

		if (mediaQuery <= 575) {
			$(window).scroll(function () {
				jQuery.expr.filters.offscreen = function (el) {
					var rect = el.getBoundingClientRect();
					return (
						(rect.x + rect.width) < 0 ||
						(rect.y + rect.height) < 0 ||
						(rect.x > window.innerWidth || rect.y > window.innerHeight)
					);
				};
		
				$('.services-list .item').each(function () {
					if ($(this).viewport().inViewport()) {
						$(this).addClass('is-hover');
					} else {
						$('.services-list .item:offscreen').removeClass('is-hover');
					}
				});
			});
		}
	};
	checkResizing();


	$(window).resize(function () {
		checkResizing();
	});

	// при смене ориентации
	window.addEventListener("orientationchange", function () {
		checkResizing();
	}, false);

	/* Replace all SVG images with inline SVG */
	jQuery('img.svg').each(function () {
		var $img = jQuery(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');

		jQuery.get(imgURL, function (data) {
			// Get the SVG tag, ignore the rest
			var $svg = jQuery(data).find('svg');

			// Add replaced image's ID to the new SVG
			if (typeof imgID !== 'undefined') {
				$svg = $svg.attr('id', imgID);
			}
			// Add replaced image's classes to the new SVG
			if (typeof imgClass !== 'undefined') {
				$svg = $svg.attr('class', imgClass + ' replaced-svg');
			}

			// Remove any invalid XML tags as per http://validator.w3.org
			$svg = $svg.removeAttr('xmlns:a');

			// Check if the viewport is set, if the viewport is not set the SVG wont't scale.
			if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
				$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
			}

			// Replace image with new SVG
			$img.replaceWith($svg);

		}, 'xml');
	});

	$("html").easeScroll();
});
