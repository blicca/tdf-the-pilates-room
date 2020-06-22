<section class="global-clients">
    <div class="theme-row global-clients-row">
        <div class="clients-left">
            <h1 class="section-title light"><?php the_field('global_client_title', 'option'); ?></h1>  
            <?php the_field('global_client_desc', 'option'); ?>        
        </div>
        <div class="client-column">
            <div class="client-slider">
            <?php
                if( have_rows('global_client_images', 'option') ): ?>
                    <?php while( have_rows('global_client_images', 'option') ): the_row(); ?>    
                        <div class="client-single">
                                <img src="<?php the_sub_field('image'); ?>" alt="client">
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