<?php
/**
 * The main template file
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
        <div class="caption-title"><h1><?php echo esc_html(get_the_title(get_option( 'page_for_posts' ))); ?></h1></div>
    </div>

    <div class="theme-row front-blog-row">
        <div class="all-blog-posts">
        <div class="grid-sizer"></div>      
        <div class="gutter-sizer"></div>  
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php 
            $postid = get_the_ID();
        ?>
                    <article class="front-blog-item" itemscope="" itemtype="http://schema.org/Article">
                        <?php if ( has_post_thumbnail() ) { ?>
                        <figure class="bt_blog_thumbnail">
                        <?php
                        if( get_field('publish_for_wechat', $postid) ) {
                            ?>
                            <a target="_blank" href="<?php the_field('wechat_link', $postid); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                            <?php
                        }
                        else { ?>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"> 
                        <?php } ?>                                               
                            <?php the_post_thumbnail('recentpost', array('itemprop'=>'image')); ?>
                        </a>
                        </figure>
                        <?php } ?>
                        <div class="front-blog-content">
                            <h3 itemprop="headline">
                                <?php
                                if( get_field('publish_for_wechat', $postid) ) {
                                    ?>
                                    <a target="_blank" href="<?php the_field('wechat_link', $postid); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                    <?php
                                }
                                else { ?>
                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"> 
                                <?php } ?>                                
                                <?php the_title(); ?>
                                <?php
                                if( get_field('publish_for_wechat', $postid) ) {
                                    ?>
                                    <img class="single-wechat-icon" src="<?php echo get_parent_theme_file_uri() . '/assets/img/blog-wechat.svg'; ?>" alt="wechat">
                                    <?php
                                }
                                ?>
                                </a>
                            </h3>                        
                            <div class="front-blog-meta">
                                <time class="bt_blog_time" datetime="<?php echo esc_attr( get_the_date('c') ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html(get_the_date()); ?></time>
                            </div>                     
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
            <?php 
            endwhile;
            endif; 
            ?>
        </div>       
            
        
        <?php
        // Load More Check            
            if ($total_pages > 1){
            ?>          
            <div class="testimonials-pagination">
                <?php 
                
                

                if ($total_pages > 1){
            
                    $current_page = max(1, get_query_var('paged'));
            
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => '?s=%#%',
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
         
    </div>  
</div>

<?php
get_footer();