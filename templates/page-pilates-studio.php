<?php
/* Template Name: Pilates Studio
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
    <div class="studio-pilates-room-container theme-row">
        <div class="page-studio-content">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>  
        </div>
        <div class="clearfix"></div>
    </div>    
</section>
<?php endwhile; // end of the loop. ?>
<?php
get_footer();