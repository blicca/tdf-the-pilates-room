<section class="home-services">
    <div class="theme-row home-services-row">
        <h1 class="section-title"><?php the_field('home_services_title'); ?></h1>
        <div class="section-description"><?php the_field('home_services_desc'); ?></div>
        <div class="home-services-grid">
        <?php 
            $r = new WP_Query( array( 'posts_per_page' => '-1', 'post_type' => 'services') );
            if ($r->have_posts()) :
                while ( $r->have_posts() ) : $r->the_post();
                ?>
                    <article class="home-services-item">
                        <figure class="services-thumbnail">
                            <?php the_post_thumbnail('full', array('itemprop'=>'image')); ?>
                        </figure>
                        <div class="home-services-content">
                            <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_field('services_sub_title', get_the_ID()); ?></a></h3>                    
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