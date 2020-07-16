<?php
/**
 * Template Name: Contact
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
<div class="main-contact-page">
    <div class="theme-row">
        <h1 itemprop="headline"><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <div class="contact-google-maps"></div>
    </div>
</div>

<?php endwhile; // end of the loop. ?>
<?php
get_footer();