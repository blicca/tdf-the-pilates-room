<?php
$approach_section = get_field('approach_section');
if( $approach_section ): ?>

<section class="home-approach">
    <div class="home-approach-bg-col" style="background-image: url('<?php echo esc_attr( $approach_section['section_image'] ); ?>');"></div>
    <div class="home-approach-container theme-row">
        <div class="home-approach-column">
            <div class="home-approach-main-content">
                <?php echo $approach_section['main_content']; ?>
            </div>
            <div class="hero-approach-list">
                <?php
                $single_approachs = $approach_section['single_approach'];
                    foreach($single_approachs as $single_approach) { ?>
                            <div class="home-sing-approach">
                                <div class="home-approach-img"><img src="<?php echo $single_approach['image']; ?>" alt="approach"></div>
                                <div class="home-approach-desc">
                                    <?php echo $single_approach['description']; ?>
                                </div>
                            </div>
                        <?php
                    }
                    ?>                    
            </div>
        </div>

        <div class="clearfix"></div>
    </div>    
    
</section>

<?php endif; ?>