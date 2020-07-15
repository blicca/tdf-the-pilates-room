<?php
get_header();
while ( have_posts() ) : the_post();
?>
<div class="default-page">
    <div class="default-page-bg">
        <div class="default-page-caption theme-row">
            <h1 itemprop="headline"><?php the_title(); ?></h1>
        </div>    
    </div>
    <div class="default-page-content">
        <div class="default-page-row theme-row">

            <div class="single-gutenberg">
                <?php the_content(); ?>  
            </div> 
            
        </div>           
    </div>
 
</div>
<?php endwhile; // end of the loop. ?>
<?php
get_footer();