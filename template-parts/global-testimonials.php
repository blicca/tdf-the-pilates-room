<section class="global-testimonials">
    <div class="global-testimonials-row">
        <div class="testimonials-header">
            <h1 class="section-title"><?php the_field('global_testimonial_title', 'option'); ?></h1>      
        </div>
        <div class="testimonials-column">
            <div class="testimonials-slider">
            <?php
                if( have_rows('global_testimonial', 'option') ): ?>
                    <?php while( have_rows('global_testimonial', 'option') ): the_row(); ?>    
                        <div class="testimonials-single">
                            <div class="testimonials-content">
                                <?php the_sub_field('content'); ?>
                            </div>
                            <div class="testimonial-footer">
                                <div class="testimonial-image"><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('name'); ?>"></div>
                                <div class="testimonial-name">
                                    <span class="tname"><?php the_sub_field('name'); ?></span>
                                    <span class="tposition"><?php the_sub_field('position'); ?></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
            ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>