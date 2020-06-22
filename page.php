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
    <div class="single-blog-row">
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