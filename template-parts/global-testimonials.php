<?php
$testimonial_section = get_field('testimonial_section');
if( $testimonial_section['show_testimonial'] ) {
?>
    <section class="home-testimonials">
        <div class="home-testimonials-row">
            <h1 class="section-title"><?php echo $testimonial_section['testimonial_title']; ?></h1>
            <div class="section-description"><?php echo $testimonial_section['testimonial_desc']; ?></div>
            <div class="home-testimonials-slider">
            <?php 
                $r = new WP_Query( array( 'posts_per_page' => $testimonial_section['testimonial_count'], 'post_type' => 'testimonials') );
                if ($r->have_posts()) :
                    while ( $r->have_posts() ) : $r->the_post();
                    ?>
                        <article class="home-testimonials-item">
                            <?php the_content(); ?>
                            <div class="home-testimonial-footer">
                                <figure class="testimonial-thumbnail">
                                    <?php the_post_thumbnail('thumbnail', array('itemprop'=>'image')); ?>
                                </figure>
                                <div class="testimonial-names">
                                    <h3><?php the_title(); ?></h3>
                                    <span class="appellation"><?php the_field('appellation', $r->ID); ?></span>
                                </div>                            
                            </div>
                        </article>
                    <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
                <div class="clearfix"></div>
            </div>
            <a class="thepilatesroom-button" href="#"><?php echo $testimonial_section['read_more_title']; ?></a>                    
        </div>
    </section>

<?php 
}