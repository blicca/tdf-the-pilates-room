<?php
/**
 * Accentor WordPress Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * @package thepilatesroom
 * @since 1.0.0
 */
 

if ( ! function_exists( 'thepilatesroom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function thepilatesroom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on The Pilates Room, use a find and replace
		 * to change 'thepilatesroom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'thepilatesroom', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support( 'post-thumbnails' );
    
    /*
	  Image sizes: new custom sizes and modified custom sizes
    */
    /* add_image_size( 'recentpost', 364, 246, array( 'center', 'center' ), 9999 ); */
    add_image_size( 'tablet', 760, array('center', 'center'), 9999 );
    add_image_size( 'product', 1903, array( 'center', 'center' ), 9999 );

    add_filter( 'image_size_names_choose', 'thepilatesroom_custom_size_names' );
    function thepilatesroom_custom_size_names( $sizes ) {
      return array_merge( $sizes, array(
        
        'tablet' => __( 'Tablet' ),
        'product' => __( 'Product' ),
      ) );
    }

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-main' => esc_html__( 'Primary', 'thepilatesroom' ),
			'menu-flyout' => esc_html__( 'Flyout', 'thepilatesroom' ),
			'footer-menu1' => esc_html__( 'Footer Menu 1', 'thepilatesroom'),
			'footer-menu2' => esc_html__( 'Footer Menu 2', 'thepilatesroom'),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			//'search-form',
			//'comment-form',
			//'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Excerpt
		function vision_expert( $length ) {
      	return 26;
    	}
    	add_filter( 'excerpt_length', 'vision_expert', 999 );
    
		//Code to remove header fluff
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'start_post_rel_link');
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );		
	
	}
endif;
add_action( 'after_setup_theme', 'thepilatesroom_setup' );





/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thepilatesroom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thepilatesroom_content_width', 752, 0 );
}
add_action( 'after_setup_theme', 'thepilatesroom_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */

function thepilatesroom_scripts() {
    wp_enqueue_style( 'thepilatesroom-fonts', 'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,700;1,400;1,700&display=swap&subset=latin', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'thepilatesroom_scripts' );

function thepilatesroom_script_style() {
  /* CSS */
  wp_enqueue_style( 'flickity', get_parent_theme_file_uri() .'/assets/css/flickity.min.css' );
  wp_enqueue_style( 'thepilatesroom', get_parent_theme_file_uri() . '/assets/css/theme-build.css', '1.0.11' );
  
    wp_enqueue_style( 'select2', get_parent_theme_file_uri() . '/assets/css/select2.min.css', '1.0.11' );
 
  /* Scripts */
  // Are you looking Ajax Scripts? Check bottom of page
  // Other Scripts:
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
  }
  wp_enqueue_script('isotope', get_parent_theme_file_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '', true);
  wp_enqueue_script('infinite-scroll', get_parent_theme_file_uri() . '/assets/js/infinite-scroll.pkgd.min.js', array('jquery'), '', true);
  wp_enqueue_script('flickity', get_parent_theme_file_uri() . '/assets/js/flickity.pkgd.min.js', array('jquery'), '', true);
  
    wp_enqueue_script('select2', get_parent_theme_file_uri() . '/assets/js/select2.min.js', array('jquery'), '', true);
  
  wp_enqueue_script('main-script', get_parent_theme_file_uri() . '/assets/js/theme-build.js', array('jquery'), '1.0.11', true);	
}
add_action( 'wp_enqueue_scripts', 'thepilatesroom_script_style' );

function load_custom_wp_admin_style(){
    wp_register_style( 'custom_wp_admin_css', get_bloginfo('stylesheet_directory') . '/assets/css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');



/*
	Add OPTIONS page for the SITE 
*/
if( function_exists('acf_add_options_page') ) {	
		acf_add_options_page(array(
			'page_title' 	=> 'Theme Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
        ));
        
		acf_add_options_page(array(
			'page_title' 	=> 'Partners',
			'menu_title'	=> 'Partners',
			'menu_slug' 	=> 'theme-partners',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'position' 		=> '7.2',
			'icon_url' 		=> 'dashicons-groups',
        )); 
        
		acf_add_options_page(array(
			'page_title' 	=> 'As Seen',
			'menu_title'	=> 'As Seen',
			'menu_slug' 	=> 'theme-clients',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'position' 		=> '7.2',
			'icon_url' 		=> 'dashicons-admin-users',
		));

}



/*********/
/* Body */
/********/
if (!function_exists('thepilatesroom_body')) {
  function thepilatesroom_body($classes) {
    $classes[] = "thepilatesroom-helper";
    return $classes;
  }
  add_filter( 'body_class', 'thepilatesroom_body' );
}

/**
 * Helper Function for ACF Image Field
 */
function awesome_acf_responsive_image($image_id,$image_size,$max_width){

	// check the image ID is not blank
	if($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

		// generate the markup for the responsive image
		echo 'itemprop="image" src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

	}
}

function get_previous_post_id( $post_id ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;
    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;
    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );
    // Get the post object for the previous post
    $previous_post = get_previous_post();
    // Reset our global object
    $post = $oldGlobal;
    if ( '' == $previous_post ) 
        return 0;
    return get_permalink($previous_post->ID); 
} 

function get_next_post_id( $post_id ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;
    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;
    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );
    // Get the post object for the next post
    $next_post = get_next_post();
    // Reset our global object
    $post = $oldGlobal;
    if ( '' == $next_post ) 
        return 0;
    return get_permalink($next_post->ID); 
}
/********************************/
/*         Pagination           */
/********************************/
if ( !function_exists('thepilatesroom_blog_pagination')) {
  function thepilatesroom_blog_pagination($pages = '', $range = 4)
    {  
        global $wp_query;
  
                            $big = 999999999; // need an unlikely integer
  
                            echo paginate_links( array(
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => 'page/%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $wp_query->max_num_pages,
                                'type'         => 'list',
                                'prev_text'          => '&laquo;',
                                'next_text'          => '&raquo;',
                            ) );
    }
}

if ( !function_exists('thepilatesroom_blog_nextprev')) {
	function thepilatesroom_blog_nextprev() {
/**
 * A template partial to output pagination for the Twenty Twenty default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/**
 * Translators:
 * This text contains HTML to allow the text to be shorter on small screens.
 * The text inside the span with the class nav-short will be hidden on small screens.
 */

$prev_text = sprintf(
	'%s <span class="nav-prev-text">%s</span>',
	'<span aria-hidden="true">&larr;</span>',
	__( 'Newer <span class="nav-short">Posts</span>', 'thepilatesroom' )
);
$next_text = sprintf(
	'<span class="nav-next-text">%s</span> %s',
	__( 'Older <span class="nav-short">Posts</span>', 'thepilatesroom' ),
	'<span aria-hidden="true">&rarr;</span>'
);

$posts_pagination = get_the_posts_pagination(
	array(
		'mid_size'  => 1,
		'prev_text' => $prev_text,
		'next_text' => $next_text,
	)
);

// If we're not outputting the previous page link, prepend a placeholder with `visibility: hidden` to take its place.
if ( strpos( $posts_pagination, 'prev page-numbers' ) === false ) {
	$posts_pagination = str_replace( '<div class="nav-links">', '<div class="nav-links"><span class="prev page-numbers placeholder" aria-hidden="true">' . $prev_text . '</span>', $posts_pagination );
}

// If we're not outputting the next page link, append a placeholder with `visibility: hidden` to take its place.
if ( strpos( $posts_pagination, 'next page-numbers' ) === false ) {
	$posts_pagination = str_replace( '</div>', '<span class="next page-numbers placeholder" aria-hidden="true">' . $next_text . '</span></div>', $posts_pagination );
}

if ( $posts_pagination ) { ?>

	<div class="pagination-wrapper section-inner">

		<hr class="styled-separator pagination-separator is-style-wide" aria-hidden="true" />

		<?php echo $posts_pagination; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped during generation. ?>

	</div><!-- .pagination-wrapper -->

	<?php
}		
	}
}

/***********************/
/* Creating Testimonials */
/***********************/
add_action('init', 'thepilatesroom_testimonials', 1, 1);
function thepilatesroom_testimonials() {

  $labels = array(
    'name' => __( 'Testimonials','thepilatesroom'),
    'singular_name' => __( 'Testimonial Item','thepilatesroom' ),
    'add_new' => _x('Add New', 'Testimonial', 'thepilatesroom'),
    'add_new_item' => __('Add New Testimonial Item','thepilatesroom'),
    'edit_item' => __('Edit Testimonial Item','thepilatesroom'),
    'new_item' => __('New Testimonial Item','thepilatesroom'),
    'view_item' => __('View Testimonial Item','thepilatesroom'),
    'search_items' => __('Search Testimonial Item','thepilatesroom'),
    'not_found' =>  __('No Testimonial item found','thepilatesroom'),
    'not_found_in_trash' => __('No Testimonial found in Trash','thepilatesroom'), 
    'parent_item_colon' => ''
    );

    $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => false, // Set to false hides Single Pages
    'show_ui' => true,
    'menu_icon' => 'dashicons-groups',
    'query_var' => true,
	'rewrite' => array('slug' => 'testimonial', 'with_front' => true),
	'has_archive' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'editor', 'thumbnail' ),
    ); 
  
    register_post_type('testimonials',$args);
}

/***********************/
/* Creating Video Library */
/***********************/
add_action('init', 'thepilatesroom_video_library', 1, 1);
function thepilatesroom_video_library() {

  $labels = array(
    'name' => __( 'Video Library','thepilatesroom'),
    'singular_name' => __( 'Video Library Item','thepilatesroom' ),
    'add_new' => _x('Add New', 'Video Library', 'thepilatesroom'),
    'add_new_item' => __('Add New Video Library Item','thepilatesroom'),
    'edit_item' => __('Edit Video Library Item','thepilatesroom'),
    'new_item' => __('New Video Library Item','thepilatesroom'),
    'view_item' => __('View Video Library Item','thepilatesroom'),
    'search_items' => __('Search Video Library Item','thepilatesroom'),
    'not_found' =>  __('No Video Library item found','thepilatesroom'),
    'not_found_in_trash' => __('No Video Library found in Trash','thepilatesroom'), 
    'parent_item_colon' => ''
    );

    $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'menu_icon' => 'dashicons-video-alt3',
    'query_var' => true,
	'rewrite' => array('slug' => 'video', 'with_front' => true),
	'has_archive' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'editor', 'thumbnail' ),
	'show_in_rest' => true,
    ); 
  
    register_post_type('video_library',$args);
}
/***********************/
/* Creating Principles */
/***********************/
add_action('init', 'thepilatesroom_principles', 1, 1);
function thepilatesroom_principles() {

  $labels = array(
    'name' => __( 'Principles','thepilatesroom'),
    'singular_name' => __( 'Principle Item','thepilatesroom' ),
    'add_new' => _x('Add New', 'Principles', 'thepilatesroom'),
    'add_new_item' => __('Add New Principles Item','thepilatesroom'),
    'edit_item' => __('Edit Principles Item','thepilatesroom'),
    'new_item' => __('New Principles Item','thepilatesroom'),
    'view_item' => __('View Principles Item','thepilatesroom'),
    'search_items' => __('Search Principles Item','thepilatesroom'),
    'not_found' =>  __('No Principles item found','thepilatesroom'),
    'not_found_in_trash' => __('No Principles found in Trash','thepilatesroom'), 
    'parent_item_colon' => ''
    );

    $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => false, // Set to false hides Single Pages
    'show_ui' => true,
    'menu_icon' => 'dashicons-video-alt3',
    'query_var' => true,
	'rewrite' => array('slug' => 'principle', 'with_front' => true),
	'has_archive' => false,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'thumbnail' ),
    ); 
  
    register_post_type('principles',$args);
}

/***********************/
/* Creating Events     */
/***********************/
add_action('init', 'thepilatesroom_events', 1, 1);
function thepilatesroom_events() {

  $labels = array(
    'name' => __( 'Events Library','thepilatesroom'),
    'singular_name' => __( 'Event Library Item','thepilatesroom' ),
    'add_new' => _x('Add New', 'Event Library', 'thepilatesroom'),
    'add_new_item' => __('Add New Event Library Item','thepilatesroom'),
    'edit_item' => __('Edit Event Library Item','thepilatesroom'),
    'new_item' => __('New Event Library Item','thepilatesroom'),
    'view_item' => __('View Event Library Item','thepilatesroom'),
    'search_items' => __('Search Event Library Item','thepilatesroom'),
    'not_found' =>  __('No Event Library item found','thepilatesroom'),
    'not_found_in_trash' => __('No Event Library found in Trash','thepilatesroom'), 
    'parent_item_colon' => ''
    );

    $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'menu_icon' => 'dashicons-calendar-alt',
    'query_var' => true,
	'rewrite' => array('slug' => 'event', 'with_front' => true),
	'has_archive' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	'show_in_rest' => true,
    ); 
  
    register_post_type('events',$args);
}

/***************************/
/* Creating Knowledge Base */
/***************************/
add_action('init', 'thepilatesroom_knowledge_base', 1, 1);
function thepilatesroom_knowledge_base() {

  $labels = array(
    'name' => __( 'Knowledge Base','thepilatesroom'),
    'singular_name' => __( 'Knowledge Base Item','thepilatesroom' ),
    'add_new' => _x('Add New', 'Knowledge Base', 'thepilatesroom'),
    'add_new_item' => __('Add New Knowledge Base Item','thepilatesroom'),
    'edit_item' => __('Edit Knowledge Base Item','thepilatesroom'),
    'new_item' => __('New Knowledge Base Item','thepilatesroom'),
    'view_item' => __('View Knowledge Base Item','thepilatesroom'),
    'search_items' => __('Search Knowledge Base Item','thepilatesroom'),
    'not_found' =>  __('No Knowledge Base item found','thepilatesroom'),
    'not_found_in_trash' => __('No Knowledge Base found in Trash','thepilatesroom'), 
    'parent_item_colon' => ''
    );

    $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'menu_icon' => 'dashicons-calendar-alt',
    'query_var' => true,
	'rewrite' => array('slug' => 'knowledge-base', 'with_front' => true),
	'has_archive' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	'show_in_rest' => true,
    ); 
  
    register_post_type('knowledge_base',$args);
}
/***************************/
/* Creating Sessions       */
/***************************/
add_action('init', 'thepilatesroom_sessions', 1, 1);
function thepilatesroom_sessions() {

  $labels = array(
    'name' => __( 'Sessions','thepilatesroom'),
    'singular_name' => __( 'Sessions Item','thepilatesroom' ),
    'add_new' => _x('Add New', 'Sessions', 'thepilatesroom'),
    'add_new_item' => __('Add New Sessions Item','thepilatesroom'),
    'edit_item' => __('Edit Sessions Item','thepilatesroom'),
    'new_item' => __('New Sessions Item','thepilatesroom'),
    'view_item' => __('View Sessions Item','thepilatesroom'),
    'search_items' => __('Search Sessions Item','thepilatesroom'),
    'not_found' =>  __('No Sessions item found','thepilatesroom'),
    'not_found_in_trash' => __('No Sessions found in Trash','thepilatesroom'), 
    'parent_item_colon' => ''
    );

    $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'menu_icon' => 'dashicons-calendar-alt',
    'query_var' => true,
	'rewrite' => array('slug' => 'sessions', 'with_front' => true),
	'has_archive' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	'show_in_rest' => true,
    ); 
  
    register_post_type('sessions',$args);
}
/************************/
/*  Creating Gutenberg  */
/************************/
 
function my_plugin_block_categories( $categories, $post ) {

    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'thepilatesroom',
                'title' => __( 'TDF Digital', 'thepilatesroom' ),
                'icon'  => 'wordpress',
            ),
        )
    );
}
add_filter( 'block_categories', 'my_plugin_block_categories', 10, 2 );

function register_acf_block_types() {

    // register meet the team block.
    acf_register_block_type(array(
        'name'              => 'video_content',
        'title'             => __('TPR Videos', 'thepilatesroom'),
        'description'       => __('Add videos from your library', 'thepilatesroom'),
        'render_template'   => 'template-parts/global-videos.php',
        'category'          => 'thepilatesroom',
        'icon'              => 'video-alt3',
        'keywords'          => array( 'videos', 'video', 'library' ),
    ));
    
    // register meet the team block.
    acf_register_block_type(array(
        'name'              => 'warning_box',
        'title'             => __('Warning Box', 'thepilatesroom'),
        'description'       => __('Create warning/notice/info box', 'thepilatesroom'),
        'render_template'   => 'template-parts/global-warning.php',
        'category'          => 'thepilatesroom',
        'icon'              => 'info',
        'keywords'          => array( 'warning', 'notice', 'info' ),
	));    
	
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}


/*******************/
/* Remove Comments */
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


add_filter( 'wpcf7_autop_or_not', '__return_false' );


/*Allow Span tags in editor*/
function myextensionTinyMCE($init) {
    // Command separated string of extended elements
    $ext = 'span[id|name|class|style]';

    // Add to extended_valid_elements if it alreay exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    // Super important: return $init!
    return $init;
}

add_filter('tiny_mce_before_init', 'myextensionTinyMCE' );

/** 
 * Include Ajax Files
*/
include_once( 'inc/ajax-video-library.php' );


