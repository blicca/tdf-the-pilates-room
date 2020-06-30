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
		'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1, // galiba bu da gereksiz çalışmıyor.
		'max_page' => $wp_query->max_num_pages, // aslında gereksiz kod
		'year' => 'All',
		'selectedmonth' => 'All'
	) );
 
 	wp_enqueue_script( 'theme-ajax-video-library' );
}


add_action('wp_ajax_thepilatesroom_ajax_video_library_handler', 'thepilatesroom_ajax_video_library_handler');
add_action('wp_ajax_nopriv_thepilatesroom_ajax_video_library_handler', 'thepilatesroom_ajax_video_library_handler');
 
function thepilatesroom_ajax_video_library_handler(){
 
	// prepare our arguments for the query
	$args = array(
		'post_type'=>'video_library',
		'posts_per_page' => 3,
		'paged' => sanitize_text_field($_POST['page'] + 1),
	);

	$r = new WP_Query( $args );
 
	if( $r->have_posts() ) :
 
		// run the loop
        while( $r->have_posts() ): $r->the_post();
        
            get_template_part( 'template-parts/loop', 'video-library' );
 
		endwhile;
	endif;
	wp_reset_postdata();
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_thepilatesroom_video_library_filter', 'thepilatesroom_video_library_filter'); 
add_action('wp_ajax_nopriv_thepilatesroom_video_library_filter', 'thepilatesroom_video_library_filter');
 
function thepilatesroom_video_library_filter(){
	if ( sanitize_text_field($_POST['year']) == "Videos" ) {
		$args = array(
			'post_type'=>'video_library',
			'posts_per_page' => 3,
		);
	}
	else {
		$args = array(
			'post_type'=>'video_library',
			'posts_per_page' => 3,
			'year' => sanitize_text_field($_POST['year']),
			'monthnum' => sanitize_text_field($_POST['selectedmonth']),
		);
	}
	$r = new WP_Query( $args );
	$total_pages = $r->max_num_pages;

	if( $r->have_posts() ) :
		// run the loop
		?>
		<div class="all-video-posts" data-videomaxpage="<?php echo esc_attr($total_pages); ?>">
		<?php
        while( $r->have_posts() ): $r->the_post();
        
            get_template_part( 'template-parts/loop', 'video-library' );
 
		endwhile;
		?>
		</div>
		<?php
	
	endif;
	wp_reset_postdata();
	die();
}