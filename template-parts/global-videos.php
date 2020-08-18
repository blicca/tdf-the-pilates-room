<?php

/**
 * Video Content
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'thepilatesroom-video-library-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'thepilatesroom-video-library';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$video_post_id = get_field('choose_video') ?: '';
$add_title = get_field('add_title') ?: '';
$add_content = get_field('add_content') ?: '';
$vimeo_url = get_field('vimeo_url', $video_post_id);

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <figure class="video-preview-image trigger-video" data-vimeo="<?php echo esc_js($vimeo_url); ?>" data-vidtitle="<?php echo esc_js(get_field('video_title', $video_post_id)); ?>">
        <?php 
            if ( has_post_thumbnail($video_post_id) ) { 
                echo get_the_post_thumbnail($video_post_id, 'full', array('itemprop'=>'image')); 
            } else { 
                echo '<img src="'.getIdFromVimeoURL(esc_attr($vimeo_url)).'">';
            }
        ?>
        <div class="single-play-icon"> 
            <img src="<?php echo get_parent_theme_file_uri() . '/assets/img/video-play-ico.svg'; ?>" alt="play">
        </div>
    </figure>
    <?php 
    // Check do you want to add title from other post
    if ( $add_title ) { ?>
    <h4 itemprop="headline"><?php echo get_the_title($video_post_id); ?></h4>
    <?php } ?>
    <?php
    // Check do you want to add content from other post
    if ( $add_content ) { 
    echo apply_filters('the_content', get_post_field('post_content', $video_post_id));
    }
    ?>             
</div>