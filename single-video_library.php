<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
?>
<?php
get_header();
?>

<article class="single-blog" itemscope="" itemtype="http://schema.org/Article">
    <?php
	// Overview Section (over default wordpress content)
	if (have_posts()) : while (have_posts()) : the_post(); 
    ?>    


    <div class="single-blog-content">
        <div class="single-blog-row">
            <h1 class="main-single-title" itemprop="headline"><?php the_title(); ?></h1>
            <div class="single-page-time"><?php echo esc_html__("Posted on", "thepilateslibrary"); ?> <time class="bt_blog_time" datetime="<?php echo esc_attr( get_the_date('c') ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html(get_the_date()); ?></time> <?php echo esc_html__("in Video Library", "thepilatesroom"); ?></div>            
            <figure class="video-preview-image trigger-video" data-vimeo="<?php echo esc_js(get_field('vimeo_url', $postid)); ?>" data-vidtitle="<?php echo esc_js(get_field('video_title', $postid)); ?>">
                <?php the_post_thumbnail('large', array('itemprop'=>'image')); ?>
                <div class="single-play-icon"> 
                <img src="<?php echo get_parent_theme_file_uri() . '/assets/img/video-play-ico.svg'; ?>" alt="play">
                </div>
            </figure>
            <div class="unique-blog-content">
                <?php the_content(); ?>  
            </div> 
        </div>           
    </div>
    <?php
    endwhile; else: ?>
    <p><?php echo esc_html__("Sorry, no posts matched your criteria.", "thepilatesroom"); ?></p>
    <?php endif;
    ?>    
</article>
<?php
get_footer();