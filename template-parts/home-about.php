<?php
$hero = get_field('hero_section');
if( $hero_section ): ?>

<section class="home-about" style="background-image:url('<?php echo esc_attr( $hero['hero_image'] ); ?>')">
    <div class="home-about-container theme-row">
        <div class="hero-about-content">
            <h1><?php echo esc_attr( $hero['hero_title'] ); ?></h1>
            <?php echo esc_attr( $hero['hero_description'] ); ?>
            <a href="#">Start 14-Day free trial</a>
            <div class="button-desc"><?php echo esc_attr( $hero['button_desc'] ); ?></div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>

<?php endif; ?>