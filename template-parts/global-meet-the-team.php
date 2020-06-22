<?php

/**
 * Meet The Team Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Create class attribute allowing for custom "className" and "align" values.
$className = 'meet-the-team-gutenberg';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>


<div class="meet-our-team-containers <?php echo esc_attr($className); ?>">
    <?php 
        $r = new WP_Query( array( 'posts_per_page' => '-1', 'post_type' => 'meet_our_teams') );
        if ($r->have_posts()) :
            while ( $r->have_posts() ) : $r->the_post();
            ?>
                <div class="grid-team-member">
                    <figure class="grid-team-photo">
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">       
                        <?php the_post_thumbnail('full', array('itemprop'=>'image')); ?>
                    </a>
                    </figure>
                    <div class="grid-meta-content">
                        <h4><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                        <span class="team-position"><?php the_field('position', get_the_ID());?></span>      
                        <div class="partner-text"><?php the_field('position_partner', get_the_ID()); ?></div>
                        <div class="grid-phone"><span><?php the_field('mobile', get_the_ID()); ?></span></div>
                    </div>
                </div>
            <?php
            endwhile;
        endif;
        wp_reset_query();
        ?>
        <div class="clearfix"></div>    
</div>