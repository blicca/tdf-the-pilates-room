<?php
/* Template Name: Sign Up
 * @package thepilatesroom
 * @since 1.0.0
 */

get_header();
?>
<?php
while ( have_posts() ) : the_post();
?>
<div class="log-in-container">
    <div class="log-in-bg" style="background-image:url('<?php echo get_parent_theme_file_uri() . '/assets/img/logbgmain.png'; ?>')"></div>
    <div class="log-in-form-col">
    <h2>Sign Up</h2>
    <?php
    the_content();
    ?>
    <div class="sign-up-footer">
        <div class="sign-up-copyright">© <span class="footer-year"></span> The Pilates Room. All rights reserved.</div>
        <div class="sign-up-policy">
            <?php
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link( '', '' );
                }
            ?>
            <span class="link-seperator">|</span>
            <a href="/terms-and-conditions" target="_blank">Terms of Service</a>            
        </div>
    </div>
    </div>
</div>
<?php endwhile; // end of the loop. ?>
<?php
get_footer();