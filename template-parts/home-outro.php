<?php
$hero_section = get_field('hero_section');
$outro_section = get_field('outro_section');
if( $hero_section ): ?>

<section class="home-outro">
    <div class="home-outro-container theme-row">
        <div class="hero-outro-content">
            <h1><?php echo $outro_section['title']; ?></h1>
            <?php echo $outro_section['description']; ?>
            <a class="thepilatesroom-button" href="#">Start 14-Day free trial</a>
            <div class="button-desc"><?php echo $hero_section['button_desc']; ?></div>
        </div>
        <div class="clearfix"></div>
    </div>    
</section>

<?php endif; ?>