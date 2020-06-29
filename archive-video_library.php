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
<div class="main-blog">
    <div class="main-blog-caption">
        <div class="caption-title"><h1><?php post_type_archive_title(); ?></h1></div>
    </div>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type'=>'video_library',
    'posts_per_page' => 6,
    'paged' => $paged,
);
$r = new WP_Query( $args );
?>
    <div class="theme-row video-library-row">
        <div class="all-video-posts">
        <?php if ( $r->have_posts() ) : while ( $r->have_posts() ) : $r->the_post(); ?>
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
                        <time class="video-date" datetime="<?php echo esc_attr( get_the_date('c') ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html(get_the_date()); ?></time>
                            <?php the_excerpt(); ?>                                                    
                        </div>
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
        wp_reset_postdata();
        ?>
    </div>  
</div>

<?php
get_footer();