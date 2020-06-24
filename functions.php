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
			'footer-menu3' => esc_html__( 'Footer Menu 3', 'thepilatesroom'),
			'footer-menu4' => esc_html__( 'Footer Menu 4', 'thepilatesroom'),
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

/*
Register Fonts
*/
function thepilatesroom_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'thepilatesroom' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Lora:ital,wght@0,400;0,700;1,400;1,700&display=swap' ), "//fonts.googleapis.com/css" );
    }

    return $font_url;
}

/*
Enqueue scripts and styles.
*/
function thepilatesroom_scripts() {
    wp_enqueue_style( 'thepilatesroom-fonts', thepilatesroom_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'studio_scripts' );

function thepilatesroom_script_style() {
  /* CSS */
  wp_enqueue_style( 'slick-slider', get_parent_theme_file_uri() .'/assets/css/slick.css' );
  wp_enqueue_style( 'slick-slider-theme', get_parent_theme_file_uri() .'/assets/css/slick-theme.css' );
  wp_enqueue_style( 'thepilatesroom', get_parent_theme_file_uri() . '/assets/css/theme-build.css', '1.0.11' );
  /* Scripts */
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
  }
  wp_enqueue_script('isotope', get_parent_theme_file_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '', true);
  wp_enqueue_script('infinite-scroll', get_parent_theme_file_uri() . '/assets/js/infinite-scroll.pkgd.min.js', array('jquery'), '', true);
  wp_enqueue_script('slick-slider', get_parent_theme_file_uri() . '/assets/js/slick.min.js', array('jquery'), '', true);
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
			'page_title' 	=> 'Sliders',
			'menu_title'	=> 'Sliders',
			'menu_slug' 	=> 'theme-sliders',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'position' 		=> '7.2',
			'icon_url' 		=> 'dashicons-images-alt2',
		));

		acf_add_options_page(array(
			'page_title' 	=> 'Clients',
			'menu_title'	=> 'Clients',
			'menu_slug' 	=> 'theme-clients',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'position' 		=> '7.2',
			'icon_url' 		=> 'dashicons-admin-users',
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

/********************************/
/*         Pagination           */
/********************************/
if ( !function_exists('thepilatesroom_blog_pagination')) {
  function thepilatesroom_blog_pagination($pages = '', $range = 4)
    {  
        global $wp_query;
  
                            $big = 999999999; // need an unlikely integer
  
                            echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
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
/* Creating Services */
/***********************/
add_action('init', 'thepilatesroom_services', 1, 1);
function thepilatesroom_services() {

  $labels = array(
    'name' => __( 'Services','thepilatesroom'),
    'singular_name' => __( 'Service Item','thepilatesroom' ),
    'rewrite' => array('slug' => __( 'service_item','thepilatesroom' )),
    'add_new' => _x('Add New', 'service', 'thepilatesroom'),
    'add_new_item' => __('Add New Service Item','thepilatesroom'),
    'edit_item' => __('Edit Service Item','thepilatesroom'),
    'new_item' => __('New Service Item','thepilatesroom'),
    'view_item' => __('View Service Item','thepilatesroom'),
    'search_items' => __('Search Service Item','thepilatesroom'),
    'not_found' =>  __('No service found','thepilatesroom'),
    'not_found_in_trash' => __('No service found in Trash','thepilatesroom'), 
    'parent_item_colon' => ''
    );

    $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'menu_icon' => 'dashicons-clipboard',
    'query_var' => true,
	'rewrite' => array('slug' => 'services', 'with_front' => true),
	'has_archive' => false,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	'show_in_rest' => true,
    ); 
  
    register_post_type('services',$args);
}

/***********************/
/* Creating Meet Our Teams */
/***********************/
add_action('init', 'thepilatesroom_meet_our_teams', 1, 1);
function thepilatesroom_meet_our_teams() {

  $labels = array(
    'name' => __( 'Meet Our Team','thepilatesroom'),
    'singular_name' => __( 'Team Item','thepilatesroom' ),
    'add_new' => _x('Add New', 'team', 'thepilatesroom'),
    'add_new_item' => __('Add New Team Item','thepilatesroom'),
    'edit_item' => __('Edit Team Item','thepilatesroom'),
    'new_item' => __('New Team Item','thepilatesroom'),
    'view_item' => __('View Team Item','thepilatesroom'),
    'search_items' => __('Search Team Item','thepilatesroom'),
    'not_found' =>  __('No team item found','thepilatesroom'),
    'not_found_in_trash' => __('No team found in Trash','thepilatesroom'), 
    'parent_item_colon' => ''
    );

    $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'menu_icon' => 'dashicons-groups',
    'query_var' => true,
	'rewrite' => array('slug' => 'meet-our-team', 'with_front' => true),
	'has_archive' => false,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'editor', 'thumbnail' ),
	'show_in_rest' => true,
    ); 
  
    register_post_type('meet_our_teams',$args);
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
        'name'              => 'meet_the_team_block',
        'title'             => __('Meet The Team', 'thepilatesroom'),
        'description'       => __('A custom meet the team block.', 'thepilatesroom'),
        'render_template'   => 'template-parts/global-meet-the-team.php',
        'category'          => 'thepilatesroom',
        'icon'              => 'groups',
        'keywords'          => array( 'team', 'meet' ),
	));
	
	// register jobs
    acf_register_block_type(array(
        'name'              => 'single_job_block',
        'title'             => __('Job', 'thepilatesroom'),
        'description'       => __('A custom BT Recruitment block.', 'thepilatesroom'),
        'render_template'   => 'template-parts/global-single-job.php',
        'category'          => 'thepilatesroom',
        'icon'              => 'money',
        'keywords'          => array( 'job', 'recruitment', 'career' ),
	));
	
	// register jobs
    acf_register_block_type(array(
        'name'              => 'contact_box_block',
        'title'             => __('Contact Box', 'thepilatesroom'),
        'description'       => __('A custom contact box block.', 'thepilatesroom'),
        'render_template'   => 'template-parts/global-contact-box.php',
        'category'          => 'thepilatesroom',
        'icon'              => 'email-alt',
        'keywords'          => array( 'contact', 'box', 'career' ),
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

/* WPML REMOVE */
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);