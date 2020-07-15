<?php
/* Template Name: Log in
 * @package thepilatesroom
 * @since 1.0.0
 */

get_header();
?>
<?php
while ( have_posts() ) : the_post();
?>
<div class="log-in-container">
    <div class="log-in-bg" style="background-image:url('<?php the_field("background"); ?>')"></div>
    <div class="log-in-form-col">
    <?php
    the_content();
    ?>
    </div>
</div>
<?php endwhile; // end of the loop. ?>
<?php
get_footer();