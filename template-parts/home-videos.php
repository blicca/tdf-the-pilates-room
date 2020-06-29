<section class="home-video">
    <div class="theme-row home-video-row">
        <h1 class="section-title"><?php the_field('home_video_title'); ?></h1>
        <div class="section-description"><?php the_field('home_video_desc'); ?></div>
        <div class="home-video-grid">
        <?php 
            $r = new WP_Query( array( 'posts_per_page' => '3', 'post_type' => 'video_library') );
            if ($r->have_posts()) :
                while ( $r->have_posts() ) : $r->the_post();
                ?>
                    <article class="home-video-item">
                        <figure class="video-thumbnail">
                            <?php the_post_thumbnail('full', array('itemprop'=>'image')); ?>
                        </figure>
                        <div class="home-video-content">
                            <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_field('video_sub_title', get_the_ID()); ?></a></h3>                    
                            <?php the_excerpt(); ?>
                            <a class="bt_read_more" href="<?php the_permalink(); ?>"><?php echo esc_html__("Read more", "thepilatesroom"); ?> <img class="readmore-icon" src="<?php echo get_parent_theme_file_uri() . '/assets/img/arrow-right.svg'; ?>" alt="read more">
</a>
                        </div>
                    </article>
                <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>
            <div class="clearfix"></div>
        </div>                    
    </div>
</section>