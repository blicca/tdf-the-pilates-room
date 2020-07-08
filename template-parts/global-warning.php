<?php

/**
 * Warning Box
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'thepilatesroom-warning-box-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'thepilatesroom-warning-box';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$video_post_id = get_field('warning_content') ?: '';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="warning-box-thumb"><img width="22" height="22" src="<?php echo get_parent_theme_file_uri(); ?>/assets/img/c-warning.svg" alt="warning"></div>
    <div class="warning-box-content"><?php the_field('warning_content'); ?></div>            
</div>