<?php
$hero_section = get_field('hero_section');
if( $hero_section ): ?>

<section class="home-about">
    <div class="hero-bg-col" style="background-image:url('<?php echo esc_attr( $hero_section['hero_image'] ); ?>')"></div>
    <div class="home-about-container theme-row">
        <div class="hero-about-content">
            <h1><?php echo $hero_section['hero_title']; ?></h1>
            <?php echo $hero_section['hero_description']; ?>
            <a href="#">Start 14-Day free trial</a>
            <div class="button-desc"><?php echo $hero_section['button_desc']; ?></div>
        </div>
        <div class="clearfix"></div>
    </div>    
</section>

<?php endif; ?>