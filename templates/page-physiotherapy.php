<?php
/* Template Name: Physiotherapy
 * @package thepilatesroom
 * @since 1.0.0
 */

get_header();
?>

<?php
while ( have_posts() ) : the_post();
?>

<section class="studio-pilates-room">
    <div class="hero-bg-col" style="background-image:url('<?php the_field("background"); ?>')"></div>
    <div class="studio-pilates-room-container physiotherapy-main-row theme-row">
        <div class="page-studio-content">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>  
        </div>
        <div class="clearfix"></div>
    </div>    
</section>
<div class="physiotherapy-row2 physiotherapy-row">
    <div class="hero-bg-col" style="background-image:url('<?php the_field("background2"); ?>')"></div>
    <div class="studio-pilates-room-container theme-row">
        <div class="page-studio-content">
            <?php the_field('content2'); ?>
            <?php 
			$link = get_field('row2button');
			if( $link ): 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a class="thepilatesroom-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="square"></span></a>
            <?php endif; 
            ?>
        </div>
        <div class="clearfix"></div>
    </div> 
</div>
<div class="physiotherapy-row3 physiotherapy-row">
    <div class="hero-bg-col" style="background-image:url('<?php the_field("background3"); ?>')"></div>
    <div class="studio-pilates-room-container theme-row">
        <div class="page-studio-content">
            <?php the_field('content3'); ?>
            <?php 
			$link = get_field('row3button');
			if( $link ): 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a class="thepilatesroom-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><span class="square"></span></a>
            <?php endif; 
            ?>              
        </div>
        <div class="clearfix"></div>
    </div>     
</div>
<?php endwhile; // end of the loop. ?>
<?php
get_footer();