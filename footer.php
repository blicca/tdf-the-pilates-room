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
                        <?php the_field("footer_column_2", "option"); ?>
                    </div>                
                </div>
                <div class="footer-top-col3">
                    <div class="footer-nav">
                        <?php the_field("footer_column_3", "option"); ?>
                    </div>                
                </div>
                <div class="footer-top-col4">
                    <div class="footer-nav">
                        <?php the_field("footer_column_4", "option"); ?>
                        <div class="clearfix"></div>>
                    </div>                
                </div>
                <div class="clearfix"></div>                                                
            </div>    

        </div> 
        <div class="theme-row footer-bot-row">

        
            <div class="footer-copy-container">
                
                <div class="footer-copy-left">
                    <p><?php the_field('footer_copyright', 'option'); ?> 
                    <span class="tpp-link">
                    <?php
                        if ( function_exists( 'the_privacy_policy_link' ) ) {
                            the_privacy_policy_link( '', '' );
                        }
                    ?>
                    </span>
                    </p>
                    <div class="footer-extra-desc"><?php the_field('copyright_description', 'option'); ?></div> 
                </div>
                <div class="footer-copy-right">
                        <?php the_field('footer_copyright_right', 'option'); ?>               
                </div>
                    <div class="clearfix"></div>
            </div>
     
            
        </div>  

    </footer>

</div><!-- #thepilatesroom-page -->
<!-- Mobile menu -->
<div class="mobile-menu-container">
    <div class="mobile-menu-row">
        <div class="mobile-menu-closing"><img src="<?php echo get_parent_theme_file_uri() . '/assets/img/main-thin-times.svg'; ?>" alt="close"></div>
        <div class="mobile-menu-nav">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-flyout',
                    'menu_id'        => 'menu-main2',
                    'container_class' => 'menu-main-menu-container'
                ));
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