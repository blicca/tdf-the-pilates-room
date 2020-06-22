<section class="home-about">
    <div class="home-about-container theme-row">
        <div class="home-about-title">
            <h1 class="section-title light"><?php the_field('home_about_us_title'); ?></h1>
        </div>
        <div class="home-about-content">
            <?php the_field('home_about_us_content'); ?>
			<?php 
				$link = get_field('home_about_button');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="thepilatesroom-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="square"></span></a>
			<?php endif; ?>	
            <img class="section-icon" src="<?php echo get_parent_theme_file_uri() . '/assets/img/quote.svg'; ?>" alt="about us">
        </div>
        <div class="clearfix"></div>
    </div>
</section>