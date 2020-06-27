<?php
/* Template Name: Homepage
 * @package thepilatesroom
 * @since 1.0.0
 */

get_header();
?>

<?php get_template_part( 'template-parts/home', 'about' ); ?>

<?php get_template_part( 'template-parts/global', 'clients'); ?>

<?php get_template_part( 'template-parts/home', 'benefits'); ?>

<?php get_template_part( 'template-parts/home', 'approachs'); ?>

<?php the_content(); ?>

<?php wp_link_pages(); ?> 
<?php
get_footer();