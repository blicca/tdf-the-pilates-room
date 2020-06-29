(function($) {
    "use strict"; 
	/*
	 * Load More
	 */
	$('.video-library-load-more').on('click', function(){
 
		$.ajax({
			url : theme_loadmore_params.ajaxurl, // AJAX handler
			data : {
				'action': 'thepilatesroom_ajax_video_library_handler', // the parameter for admin-ajax.php
				'query': theme_loadmore_params.posts, // loop parameters passed by wp_localize_script()
				'page' : theme_loadmore_params.current_page // current page
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('.video-library-load-more').text('Loading...'); // some type of preloader
			},
			success : function( posts ){
				if( posts ) {
 
					$('.video-library-load-more').text( 'More posts' );
					$('.all-video-posts').append( posts ); // insert new posts
					theme_loadmore_params.current_page++;
 
					if ( theme_loadmore_params.current_page == theme_loadmore_params.max_page ) 
						$('.video-library-load-more').hide(); // if last page, HIDE the button
 
				} else {
					$('.video-library-load-more').hide(); // if no data, HIDE the button as well
				}
			}
		});
		return false;
	});
 
	/*
	 * Filter
	 */
	$('#misha_filters').submit(function(){
 
		$.ajax({
			url : theme_loadmore_params.ajaxurl,
			data : $('#misha_filters').serialize(), // form data
			dataType : 'json', // this data type allows us to receive objects from the server
			type : 'POST',
			beforeSend : function(xhr){
				$('#misha_filters').find('button').text('Filtering...');
			},
			success : function( data ){
 
				// when filter applied:
				// set the current page to 1
				theme_loadmore_params.current_page = 1;
 
				// set the new query parameters
				theme_loadmore_params.posts = data.posts;
 
				// set the new max page parameter
				theme_loadmore_params.max_page = data.max_page;
 
				// change the button label back
				$('#misha_filters').find('button').text('Apply filter');
 
				// insert the posts to the container
				$('#misha_posts_wrap').html(data.content);
 
				// hide load more button, if there are not enough posts for the second page
				if ( data.max_page < 2 ) {
					$('#misha_loadmore').hide();
				} else {
					$('#misha_loadmore').show();
				}
			}
		});
 
		// do not submit the form
		return false;
 
	});
 
})(jQuery);