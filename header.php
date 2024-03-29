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
					<img alt="Logo" width="199" height="24" src="<?php the_field('logo', 'option'); ?>" />
                </a>										
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <?php
				if ( is_user_logged_in() ) {
                wp_nav_menu( array(
                    'theme_location' => 'menu-main-login',
                    'menu_id'        => 'menu-main',
				));
				}
				else {
					wp_nav_menu( array(
						'theme_location' => 'menu-main',
						'menu_id'        => 'menu-main',
					));	
				}
                ?>
			</nav><!-- #site-navigation -->
			
			
			<?php 
				if ( is_user_logged_in() ) {
				?>
				<div class="header-button-col-in">
				<?php
					$current_user = wp_get_current_user();
					echo '<a class="user-profile-link" href="/index.php/account/"><img width="36" height="36" src="'. esc_url( get_avatar_url( $current_user->ID ) ). '" /></a>';
					echo '<a class="user-profile-link-name" href="/index.php/account/">'. $current_user->user_firstname . ' ' . $current_user->user_lastname . '</a>';
					echo '<a class="exit" href="' . wp_logout_url( home_url() ) . '"><img width="16" height="16" src="'. get_parent_theme_file_uri() . '/assets/img/logOut.svg" alt="exit"></a>';
					echo '</div>';
			}
			else { ?>
				<div class="header-button-col">	
					<a href="/register/the-pilates-room-online/">Sign Up</a>
					<a href="/log-in">Log in</a>
				</div>
			<?php } ?>
			

			<div class="mobile-menu-icon">
				<div class="icoline"></div>
				<div class="icoline"></div>
				<div class="icoline"></div>
			</div>
		</div>		
	</header><!-- #thepilatesroom-header -->
	<main id="thepilatesroom-content" class="thepilatesroom-content">