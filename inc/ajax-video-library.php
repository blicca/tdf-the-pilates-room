<?php
add_action( 'wp_enqueue_scripts', 'thepilatesroom_ajax_video_library_scripts');
 
function thepilatesroom_ajax_video_library_scripts() {
	// absolutely need it, because we will get $wp_query->query_vars and $wp_query->max_num_pages from it.
	global $wp_query;
 
	// when you use wp_localize_script(), do not enqueue the target script immediately
	wp_register_script( 'theme-ajax-video-library', get_parent_theme_file_uri() . '/assets/js/ajax-video-library.js', array('jquery'), '1.0', true );
 
	// passing parameters here
	wp_localize_script( 'theme-ajax-video-library', 'theme_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'theme-ajax-video-library' );
}


add_action('wp_ajax_thepilatesroom_ajax_video_library_handler', 'thepilatesroom_ajax_video_library_handler');
add_action('wp_ajax_nopriv_thepilatesroom_ajax_video_library_handler', 'thepilatesroom_ajax_video_library_handler');
 
function thepilatesroom_ajax_video_library_handler(){
 
	// prepare our arguments for the query
	$params = json_decode( stripslashes( $_POST['query'] ), true ); // query_posts() takes care of the necessary sanitization 
	$params['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$params['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $params );
 
	if( have_posts() ) :
 
		// run the loop
        while( have_posts() ): the_post();
        
            get_template_part( '../template-parts/loop', 'video-library' );
 
		endwhile;
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_thepilatesroom_ajax_video_library_handler', 'thepilatesroom_video_library_filter'); 
add_action('wp_ajax_nopriv_thepilatesroom_ajax_video_library_handler', 'thepilatesroom_video_library_filter');
 
function thepilatesroom_video_library_filter(){
 
	// example: date-ASC 
	$order = explode( '-', $_POST['misha_order_by'] );
 
	$params = array(
		'posts_per_page' => $_POST['misha_number_of_results'], // when set to -1, it shows all posts
		'orderby' => $order[0], // example: date
		'order'	=> $order[1] // example: ASC
	);
 
 
	query_posts( $params );
 
	global $wp_query;
 
	if( have_posts() ) :
 
 		ob_start(); // start buffering because we do not need to print the posts now
 
		while( have_posts() ): the_post();
 
			get_template_part( '../template-parts/loop', 'video-library' );
 
		endwhile;
 
 		$posts_html = ob_get_contents(); // we pass the posts to variable
   		ob_end_clean(); // clear the buffer
	else:
		$posts_html = '<p>Nothing found for your criteria.</p>';
	endif;
 
	// no wp_reset_query() required
 
 	echo json_encode( array(
		'posts' => json_encode( $wp_query->query_vars ),
		'max_page' => $wp_query->max_num_pages,
		'found_posts' => $wp_query->found_posts,
		'content' => $posts_html
	) );
 
	die();
}