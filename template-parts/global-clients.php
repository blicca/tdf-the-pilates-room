<section class="global-clients-partners">
    <div class="theme-row global-clients-partners-row">
        <div class="partners-left">
            <div class="section-small-title"><?php the_field('global_partners_title', 'option'); ?></div>
            <div class="partner-column">
                <div class="partner-slider">
                <?php
                    if( have_rows('global_partners_images', 'option') ): ?>
                        <?php while( have_rows('global_partners_images', 'option') ): the_row(); ?>    
                            <div class="partner-single">
                                <img src="<?php the_sub_field('image'); ?>" alt="as seen">
                            </div>
                        <?php
                        endwhile;
                    endif;
                ?>
                </div>
            </div>                                
        </div>    
        <div class="clients-right">
            <div class="section-small-title"><?php the_field('global_client_title', 'option'); ?></div>
            <div class="client-column">
                <div class="client-slider">
                <?php
                    if( have_rows('global_client_images', 'option') ): ?>
                        <?php while( have_rows('global_client_images', 'option') ): the_row(); ?>    
                            <div class="client-single">
                                    <img src="<?php the_sub_field('image'); ?>" alt="partner">
                            </div>
                        <?php
                        endwhile;
                    endif;
                ?>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</section>