<?php
/**
 * Template Name: Principles
 * 
 * The Principles Library Template File
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
<div class="main-video-library">
    <div class="caption theme-row">
        <div class="caption-title"><h1><?php the_title(); ?></h1></div>
    </div>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type'=>'principles',
    'posts_per_page' => 6,
    'paged' => $paged,
);
$r = new WP_Query( $args );
$total_pages = $r->max_num_pages;
?>
    <div class="video-library-row theme-row">
        <div class="all-video-posts" data-videomaxpage="<?php echo esc_attr($total_pages); ?>">
            <?php if ( $r->have_posts() ) : while ( $r->have_posts() ) : $r->the_post(); ?>
            <?php 
                $postid = get_the_ID();
                
                get_template_part( 'template-parts/loop', 'principles' );
                
                endwhile;
            ?>
        </div> 

        
        <?php
        // Load More Check            

            if ($total_pages > 1){
            ?>          
            <div class="principles-load-more">
                Load More
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