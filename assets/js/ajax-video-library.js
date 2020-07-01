(function($) {
	"use strict"; 

	/*
	 * Load More Video Library
	 */
	$('.video-library-load-more').on('click', function(){
		var max_video_pages = $('.all-video-posts').data('videomaxpage');
		$.ajax({
			url : theme_loadmore_params.ajaxurl, // AJAX handler
			data : {
				'action': 'thepilatesroom_ajax_video_library_handler', // the parameter for admin-ajax.php
				'page' : theme_loadmore_params.current_page // current page,
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('.video-library-load-more').text('Loading...'); // some type of preloader
			},
			success : function( posts ){
				if( posts ) {
					$('.video-library-load-more').text('Load More');

					$('.all-video-posts').append( posts ); // insert new posts
					theme_loadmore_params.current_page++;
 
					if ( theme_loadmore_params.current_page >= max_video_pages ) {
						$('.video-library-load-more').hide(); // if last page, HIDE the button
					}
 
				} else {
					$('.video-library-load-more').hide(); // if no data, HIDE the button as well
				}
			}
		});
		return false;
	});
     
    // Filter    
	$('.video-library-select').on('select2:select', function (e) {
		var filter_date = $(this).find(':selected').text();
		filter_date = filter_date.split(" ");

		var months = [
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July',
			'August',
			'September',
			'October',
			'November',
			'December'
		];     
		var selected_month = months.indexOf(filter_date[1]) + 1;  
		theme_loadmore_params.selectedmonth = selected_month;
		theme_loadmore_params.year = filter_date[2];
		theme_loadmore_params.current_page = 1;

		$.ajax({
			url : theme_loadmore_params.ajaxurl, // AJAX handler
			data : {
				'action': 'thepilatesroom_video_library_filter', // the parameter for admin-ajax.php
				'page' : theme_loadmore_params.current_page, // current page,
				'selectedmonth' : theme_loadmore_params.selectedmonth,
				'year' : theme_loadmore_params.year

			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('.video-library-load-more').text('Loading...'); // some type of preloader
			},
			success : function( posts ){
				if( posts ) {
					$('.video-library-load-more').show();
					$('.video-library-load-more').text('Load More');
					$('.all-video-posts').remove();
					$('.video-library-filter').after( posts ); // insert new posts
					if ( theme_loadmore_params.year != "Videos" ) {
					theme_loadmore_params.current_page++;
					}
					if ( $('.all-video-posts').data('videomaxpage') < 2 ) {
					   $('.video-library-load-more').hide();
					}
					
 
				} else {
					$('.video-library-load-more').hide(); // if no data, HIDE the button as well
				}
			}
		});
		return false;
 

	});

	//
	// Load More Principles
	$('.principles-load-more').on('click', function(){
		var max_video_pages = $('.all-video-posts').data('videomaxpage');
		$.ajax({
			url : theme_loadmore_params.ajaxurl, // AJAX handler
			data : {
				'action': 'thepilatesroom_ajax_principles_handler', // the parameter for admin-ajax.php
				'page' : theme_loadmore_params.current_page // current page,
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('.principles-load-more').text('Loading...'); // some type of preloader
			},
			success : function( posts ){
				if( posts ) {
					$('.principles-load-more').text('Load More');

					$('.all-video-posts').append( posts ); // insert new posts
					theme_loadmore_params.current_page++;
 
					if ( theme_loadmore_params.current_page >= max_video_pages ) {
						$('.principles-load-more').hide(); // if last page, HIDE the button
					}
 
				} else {
					$('.principles-load-more').hide(); // if no data, HIDE the button as well
				}
			}
		});
		return false;
	});	

 
})(jQuery);