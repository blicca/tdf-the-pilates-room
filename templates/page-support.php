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
<div class="solutions-caption">
    <div class="theme-row-zero">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<div id="breadcrumbs" class="thepilatesroom-breadcrumbs">','</div>' );
        }
        ?>
        <div class="caption-title"><h1><?php the_title(); ?></h1></div>
    </div>
</div>
<div class="support-container">
    <div class="theme-row support-row">
         <div class="support-main-content">
            <?php the_field("main_content"); ?>
         </div>
         <div class="gapper"></div>
         <div class="support-second-content">
            <?php the_field("second_content"); ?>
         </div>   
    </div>
</div>

<?php
get_footer();