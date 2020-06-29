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

    <div class="theme-row video-library-row">
    <select>
        <?php wp_get_archives( array( 'post_type'=> 'video_library', 'format'=> 'option', 'type' => 'monthly', 'limit' => 24, 'show_post_count' => 'false' ) ); ?>
    </select>
        <div class="all-video-posts">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php 
            $postid = get_the_ID();
        ?>
                    <article class="video-grid-item" itemscope="" itemtype="http://schema.org/Article">
                        <figure class="video-preview-image">
                            <?php the_post_thumbnail('recentpost', array('itemprop'=>'image')); ?>
                            <div class="single-play-icon"> 
                                <img src="<?php echo get_parent_theme_file_uri() . '/assets/img/video-play-ico.svg'; ?>" alt="play">
                            </div>
                        </figure>
                        <h3 itemprop="headline"><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>                                                
                    </article>
        <?php 
            endwhile;
        ?>
        </div>           
        <div class="blog-pagination">
            <?php thepilatesroom_blog_pagination(); ?>
        </div>       
        <?php
        endif;
        ?>
    </div>  
</div>

<?php
get_footer();