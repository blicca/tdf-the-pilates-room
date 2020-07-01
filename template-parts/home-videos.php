<?php
$latest_videos_section = get_field('latest_videos_section');
if( $latest_videos_section['show_video'] ) {
?>
    <section class="home-videos">
        <div class="home-videos-row theme-row">
            <h1 class="section-title"><?php echo $latest_videos_section['video_title']; ?></h1>
            <div class="section-description"><?php echo $latest_videos_section['video_desc']; ?></div>
            <div class="home-videos-grid">
            <?php 
                $r = new WP_Query( array( 'posts_per_page' => '3', 'post_type' => 'principles') );
                if ($r->have_posts()) :
                    while ( $r->have_posts() ) : $r->the_post();
                        get_template_part( 'template-parts/loop', 'principles' );
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>

<?php 
}