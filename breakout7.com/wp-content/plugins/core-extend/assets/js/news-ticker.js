jQuery(document).ready(function($) {
	'use strict';

	var speed = 10000,
	canTick = true;

	$('.mnky-news-ticker ul li').each(function(i) {
		if (i == 0) {
			$(this).addClass('ticker-active');
		}
	});


	function startTicker() {
		setInterval(function() {
			if (canTick) {
					
				$('.mnky-news-ticker ul li.ticker-active').removeClass('ticker-active').addClass('remove');
						
				if ( $('.mnky-news-ticker ul li.remove').next().length ) {
					$('.mnky-news-ticker ul li.remove').next().addClass('next');
				} else {
					$('.mnky-news-ticker ul li').first().addClass('next');
				}
					
				$('.mnky-news-ticker ul li.next').removeClass('next').addClass('ticker-active');
					
				$('.mnky-news-ticker ul li.remove').removeClass('remove');
					
			}
		}, speed);
	}
	startTicker();
	
	
	$('.mnt-next').click(function() {
		$('.mnky-news-ticker ul li.ticker-active').removeClass('ticker-active').addClass('remove');
				
		if ( $('.mnky-news-ticker ul li.remove').next().length ) {
			$('.mnky-news-ticker ul li.remove').next().addClass('next');
		} else {
			$('.mnky-news-ticker ul li').first().addClass('next');
		}
			
		$('.mnky-news-ticker ul li.next').removeClass('next').addClass('ticker-active');
			
		$('.mnky-news-ticker ul li.remove').removeClass('remove');
	});	
	
	
	$('.mnt-back').click(function() {
		$('.mnky-news-ticker ul li.ticker-active').removeClass('ticker-active').addClass('remove');
				
		if ( $('.mnky-news-ticker ul li.remove').prev().length ) {
			$('.mnky-news-ticker ul li.remove').prev().addClass('next');
		} else {
			$('.mnky-news-ticker ul li').last().addClass('next');
		}
			
		$('.mnky-news-ticker ul li.next').removeClass('next').addClass('ticker-active');
			
		$('.mnky-news-ticker ul li.remove').removeClass('remove');
	});
	

	$('.mnky-news-ticker').on('mouseover', function() {
		canTick = false;
	});

	$('.mnky-news-ticker').on('mouseout', function() {
		canTick = true;
	});

});