<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thepilatesroom
 * @since 1.0.0
 */
//detect what type of content are we displaying
$schema_org = '';
if ( is_single() ) {
	$schema_org .= ' itemscope itemtype="http://schema.org/Article"';
} else {
	$schema_org .= ' itemscope itemtype="http://schema.org/WebPage"';
}
?>
<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie9" <?php language_attributes(); echo $schema_org; ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html <?php language_attributes(); echo $schema_org; ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="HandheldFriendly" content="True">
	<meta name="apple-touch-fullscreen" content="yes"/>
	<meta name="MobileOptimized" content="320">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
	/**
	 * One does not simply remove this and walk away alive!
	 */
	wp_head(); 
	?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="thepilatesroom-page" class="main-site">

	<header id="thepilatesroom-header" class="main-header">
		<div class="header-row">
        
            <div class="site-branding">			
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img alt="Logo" width="207" height="34" src="<?php the_field('logo', 'option'); ?>" />
					<span class="logo-alt-text"><?php echo esc_html__("Accountants & Advisors", "thepilatesroom"); ?></span>
                </a>										
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-main',
                    'menu_id'        => 'menu-main',
                ));
                ?>
			</nav><!-- #site-navigation -->
			
			<div class="header-button-col">
				<span><?php echo esc_html__("Call Us:", "thepilatesroom"); ?> <?php the_field('phone', 'option'); ?></span>
				<div class="wpml-custom-sw">
					<?php echo do_shortcode('[wpml_language_switcher type="widget" flags=0 native=0 translated=1][/wpml_language_switcher]'); ?>
				</div>
			</div>
			
			<?php 
				$link = get_field('contact_button','option');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="thepilatesroom-button contact-us-button-header" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="square"></span></a>
			<?php endif; ?>				
	
			<div class="mobile-menu-icon">
				<div class="icoline"></div>
				<div class="icoline"></div>
				<div class="icoline"></div>
			</div>
		</div>		
	</header><!-- #thepilatesroom-header -->
	<main id="thepilatesroom-content" class="thepilatesroom-content">