<?php
/**
 * Template Name: Testimonials
 * 
 * The Testimonials File
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thepilatesroom
 */

get_header();
?>
<div class="main-testimonials">
    <div class="row-bg">
        <div class="caption theme-row">
            <div class="caption-title"><h1><?php the_title(); ?></h1></div>
        </div>
    </div>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type'=>'testimonials',
    'posts_per_page' => 6,
    'paged' => $paged,
);
$r = new WP_Query( $args );
?>
    <div class="testimonials-row theme-row">
        <div class="all-testimonials-posts">
            <?php if ( $r->have_posts() ) : while ( $r->have_posts() ) : $r->the_post(); ?>
                <div class="single-testimonial">
                    <?php                     
                    the_content();
                    ?>
                    <div class="home-testimonial-footer">
                        <figure class="testimonial-thumbnail">
                            <?php the_post_thumbnail('thumbnail', array('itemprop'=>'image')); ?>
                        </figure>
                        <div class="testimonial-names">
                            <h3><?php the_title(); ?></h3>
                            <span class="appellation"><?php the_field('appellation', $r->ID); ?></span>
                        </div>                            
                    </div>     
                </div>           
                <?php
            endwhile;
            ?>
        </div> 

        
        <?php
        // Load More Check            
            $total_pages = $r->max_num_pages;
            if ($total_pages > 1){
            ?>          
            <div class="testimonials-pagination">
                <?php 
                
                

                if ($total_pages > 1){
            
                    $current_page = max(1, get_query_var('paged'));
            
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => '?paged=%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text'    => __('«'),
                        'next_text'    => __('»'),
                    ));
                } 

                ?>
            </div>
            <?php
            }

        // Load More End
        ?>    
            
            
        <?php
        endif; 
        wp_reset_postdata();
        ?>
    </div>  
</div>

<?php
get_footer();