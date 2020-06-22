<div class="home-hero-slider">
    <div class="hero-slider-container">
        <?php
        $i = 1;
        if( have_rows('home_slide', 'option') ):
            while ( have_rows('home_slide', 'option') ) : the_row();
                ?>
                <div class="slide-item">
                    <img <?php awesome_acf_responsive_image(get_sub_field( 'home_slider_image' ),'full','2048px'); ?> alt="hero-slider"<?php if($i == 1) { ?> class="load-image"<?php } ?>>
                    <div class="slide-content theme-row">
                        <div class="slide-main-title" style="color: <?php the_sub_field('text_color'); ?>"><?php the_sub_field('slide_title'); ?></div>
                        <?php
                        $sub_value = get_sub_field('slide_content');
                        if ( !empty($sub_value) ) {
                        ?>
                        <p><span style="color: <?php the_sub_field('text_color'); ?>"><?php echo $sub_value; ?></span></p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="filter"></div>
                </div>
                <?php
                $i++;
            endwhile;
        endif;
        ?>
    </div>
    <div id="home-hero-slider-timer" class="home-hero-slider-timer run-slide-timer"></div>
</div>