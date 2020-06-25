<?php
$benefits_section = get_field('benefits_section');
if( $benefits_section ): ?>

<section class="home-benefits">
    <div class="home-benefits-container theme-row">
        <div class="home-benefits-bg-col">
            <img src="<?php echo esc_attr( $benefits_section['benefit_image'] ); ?>" alt="the pilates benefits">
        </div>
    
        <div class="hero-benefits-content-col">
            <?php
            $single_benefits = $benefits_section['single_benefits'];
                foreach($single_benefits as $single_benefit) { ?>
                        <div class="home-benefit">
                            <div class="home-benefit-img"><img src="<?php echo $single_benefit['icon']; ?>" alt="as seen"></div>
                            <div class="home-benefit-desc">
                                <?php echo $single_benefit['description']; ?>
                            </div>
                        </div>
                    <?php
                }
                ?>                    
        </div>

        <div class="clearfix"></div>
    </div>    
    
</section>

<?php endif; ?>