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

    <div class="main-blog-caption">
        <h1 itemprop="headline"><?php the_title(); ?></h1>
        <time class="bt_blog_time" datetime="<?php echo esc_attr( get_the_date('c') ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html(get_the_date()); ?></time>
    </div>    

    <div class="single-blog-content">
        <div class="single-blog-row">
            <figure class="bt_blog_thumbnail">                                                
                <?php the_post_thumbnail('full', array('itemprop'=>'image')); ?>
            </figure>
            <div class="unique-blog-content">
                <?php the_content(); ?>  
            </div> 
        </div>           
    </div>
    <?php
    endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
    <?php endif;
    ?>    
</article>
<?php
get_footer();