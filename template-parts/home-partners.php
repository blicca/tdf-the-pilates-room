<section class="global-partners">
    <div class="theme-row global-partners-row">
        <div class="partners-left">
            <h1 class="section-title"><?php the_field('global_partners_title', 'option'); ?></h1>  
            <?php the_field('global_partners_desc', 'option'); ?>        
        </div>
        <div class="partner-column">
            <div class="partner-slider">
            <?php
                if( have_rows('global_partners_images', 'option') ): ?>
                    <?php while( have_rows('global_partners_images', 'option') ): the_row(); ?>    
                        <div class="partner-single">
                                <img src="<?php the_sub_field('image'); ?>" alt="partner">
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