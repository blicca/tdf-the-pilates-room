<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thepilatesroom
 * @since 1.0.0
 */

?>
    </main>
	<footer id="thepilatesroom-footer" class="main-footer">

        <div class="footer-top-background">
        <div class="theme-row footer-logo">
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img alt="Logo" width="199" height="24" src="<?php the_field('logo', 'option'); ?>" />
                </a>       
        </div>
        <div class="theme-row footer-menu-row">
                <div class="footer-top-col1">
                    <div class="footer-nav">
                        <?php the_field("footer_column_1", "option"); ?>
                    </div>
                </div>
                <div class="footer-top-col2">
                    <div class="footer-nav">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu1',
                        'menu_id'        => 'footer-menu1',
                        'menu_class'     => 'footer-menu',
                    ));
                    ?>
                    </div>                
                </div>
                <div class="footer-top-col3">
                    <div class="footer-nav">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu2',
                        'menu_id'        => 'footer-menu2',
                        'menu_class'     => 'footer-menu',
                    ));
                    ?>
                    </div>                
                </div>
                <div class="footer-top-col4">
                    <div class="footer-nav">
                        <?php
                        if( have_rows('social_links', 'option') ): ?>
                            <?php while( have_rows('social_links', 'option') ): the_row(); ?>    
                                <div class="social-single">
                                    <a href="<?php the_sub_field('social_link'); ?>" target="_blank"><img width="24" height="24" src="<?php the_sub_field('social_logo'); ?>"></a>
                                </div>
                            <?php
                            endwhile;
                        endif;
                        ?>   
                        <div class="clearfix"></div>
                    </div>                
                </div>
                <div class="clearfix"></div>                                                
            </div>    

        </div> 
        <div class="theme-row footer-bot-row">

        
            <div class="footer-copy-container">
                
                <div class="footer-copy-left">
                    <p><?php the_field('footer_copyright', 'option'); ?> </p>
                </div>
                <div class="footer-copy-right">
                    <?php
                        if ( function_exists( 'the_privacy_policy_link' ) ) {
                            the_privacy_policy_link( '', '' );
                        }
                    ?>    
                    <span class="link-seperator">|</span>
                    <a href="/terms-and-conditions" target="_blank">Terms of Service</a>           
                </div>
                <div class="clearfix"></div>
            </div>
     
            
        </div>  

    </footer>

</div><!-- #thepilatesroom-page -->
<!-- Mobile menu -->
<div id="mob-menu" class="mobile-menu-container">
    <div class="mobile-menu-row">
        <div class="mobile-menu-closing"><img src="<?php echo get_parent_theme_file_uri() . '/assets/img/main-thin-times.svg'; ?>" alt="close"></div>

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
            
        <div class="mobile-menu-nav">
            <?php
                if ( is_user_logged_in() ) {
                wp_nav_menu( array(
                    'theme_location' => 'menu-flyout-login',
                    'menu_id'        => 'menu-main2',
                    'container_class' => 'menu-main-menu-container'
                ));
                }
                else {
                    wp_nav_menu( array(
                        'theme_location' => 'menu-flyout',
                        'menu_id'        => 'menu-main2',
                        'container_class' => 'menu-main-menu-container'
                    ));
                }
            ?>
        </div>
        <div class="header-button-col">

		</div>
			
		<?php 
			$link = get_field('contact_button','option');
			if( $link ): 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a class="thepilatesroom-button contact-us-button-header" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="square"></span></a>
            <?php endif; 
        ?>	
        	        
    </div>
    <div class="mobile-overlay"></div>    
</div>
<!-- Lightbox -->
<div class="site-lightbox">
    <div class="site-lightbox-top">
          <div class="site-light-box-title"></div>
          <div class="site-light-box-close"><img width="16" height="16" src="<?php echo get_parent_theme_file_uri() . '/assets/img/main-thin-times.svg'; ?>" alt="close"></div>
    </div>
    <div class="site-lightbox-frame"></div>
</div>
<?php 
/* 
 * Stop Editing Here
 */
?>
<?php wp_footer(); ?>
</body>
</html>