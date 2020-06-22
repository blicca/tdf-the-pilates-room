<section class="front-blog">
    <div class="theme-row front-blog-row">
        <h1 class="section-title">News & Events</h1>
        <?php 
            $r = new WP_Query( array( 'posts_per_page' => '3', 'post_type' => 'post') );
            if ($r->have_posts()) :
                while ( $r->have_posts() ) : $r->the_post();
                ?>
                    <article class="front-blog-item" itemscope="" itemtype="http://schema.org/Article">
                        <figure class="bt_blog_thumbnail">
                        <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">                                                
                            <?php the_post_thumbnail('recentpost', array('itemprop'=>'image')); ?>
                        </a>
                        </figure>
                        <div class="front-blog-content">
                            <h3 itemprop="headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>                        
                            <div class="front-blog-meta">
                                <time class="bt_blog_time" datetime="<?php echo esc_attr( get_the_date('c') ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html(get_the_date()); ?></time>                                                                                                
                                <?php
                                $categories = get_the_category(); 
                                if ( ! empty( $categories ) ) {
                                    ?><span class="front-blog-cat"> · <?php echo esc_html( $categories[0]->name ); ?></span><?php   
                                } 
                                ?>  
                            </div>                     
                            <?php the_excerpt(); ?>
                            <a itemprop="url" class="bt_read_more" href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </article>
                <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>
            <div class="clearfix"></div>                    
            <a href="<?php echo esc_url(get_permalink( get_option( 'page_for_posts' ))); ?>" class="front-blog-more">More news</a>           
    </div>
</section>