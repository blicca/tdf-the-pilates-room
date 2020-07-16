<?php
/**
 * Template Name: Support
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *
 */

get_header();
?>
<?php
while ( have_posts() ) : the_post();
?>

<?php
if ( is_user_logged_in() ) {
    $current_user = wp_get_current_user();
    ?>
    <div class="main-support-page" data-cuser="<?php echo esc_js($current_user->user_firstname); ?>" data-cmail="<?php echo esc_js($current_user->user_email); ?>">
    <?php
} else { ?>
    <div class="main-support-page">
<?php }
?>
<div class="main-support-page">
    <div class="theme-row">
        <h1 itemprop="headline"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</div>

<?php endwhile; // end of the loop. ?>
<?php
get_footer();