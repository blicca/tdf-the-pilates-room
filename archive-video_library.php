<?php
/**
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
global $wp_query;
$total_pages = $wp_query->max_num_pages;
?>
    <div class="theme-row video-library-row">
        <div class="video-library-filter">
            <select class="video-library-select" style="width: 100%">
                <option></option>
                <?php wp_get_archives( array( 'post_type'=> 'video_library', 'format'=> 'option', 'type' => 'monthly', 'limit' => 24) ); ?>
            </select>
        </div>
        <div class="all-video-posts" data-videomaxpage="<?php echo esc_attr($total_pages); ?>" data-filteryear="" data-filtermonth="">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php 
                $postid = get_the_ID();
                
                get_template_part( 'template-parts/loop', 'video-library' );
                
                endwhile;
            ?>
        </div> 

        
        <?php
        // Load More Check            

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