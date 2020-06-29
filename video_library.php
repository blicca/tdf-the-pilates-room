<?php
/**
 * Template Name: Video Library
 * 
 * The Video Library Template File
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
    'post_type'=>'video_library',
    'posts_per_page' => 3,
    'paged' => $paged,
);
$r = new WP_Query( $args );
?>
    <div class="theme-row video-library-row">
    <div class="video-library-filter">
        <select class="video-library-select" style="width: 100%">
            <option></option>
            <?php wp_get_archives( array( 'post_type'=> 'video_library', 'format'=> 'option', 'type' => 'monthly', 'limit' => 24, 'show_post_count' => 'false' ) ); ?>
        </select>
    </div>
        <div class="all-video-posts">
        <?php if ( $r->have_posts() ) : while ( $r->have_posts() ) : $r->the_post(); ?>
        <?php 
            $postid = get_the_ID();
            
            get_template_part( 'template-parts/loop', 'video-library' );
            
            endwhile;
        ?>
        </div> 

        
        <?php
        // Load More Check            
            $total_pages = $r->max_num_pages;

            if ($total_pages > 1){
            ?>          
            <div class="video-library-load-more">
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