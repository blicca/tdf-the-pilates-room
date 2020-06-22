<?php
/**
 * Template Name: Wide Box
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
?>
<?php
get_header();
while ( have_posts() ) : the_post();
?>
<div class="single-blog">
    <div class="single-blog-caption">
        <div class="single-blog-row">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<div id="breadcrumbs" class="thepilatesroom-breadcrumbs">','</div>' );
        }
        ?>
        <div class="caption-title">
        <h1 itemprop="headline"><?php the_title(); ?></h1>                                           
        </div>
        </div>
    </div>

    <div class="single-blog-content">
    <div class="single-blog-row wide-row">
        <figure class="bt_blog_thumbnail">                                                
            <?php the_post_thumbnail('full', array('itemprop'=>'image')); ?>
        </figure>
        <div class="single-gutenberg">
            <?php the_content(); ?>  
        </div> 
    </div>           
    </div>
 
</div>
<?php endwhile; // end of the loop. ?>
<?php
get_footer();