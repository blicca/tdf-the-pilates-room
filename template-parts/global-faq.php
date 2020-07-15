<?php

/**
 * Faq
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'thepilatesroom-faq-box-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'thepilatesroom-faq-box';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$faq_title = get_field('faq_title') ?: '';
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="faq-title">
        <?php echo esc_html($faq_title); ?>
        <img width="11" height="6" src="<?php echo get_parent_theme_file_uri(); ?>/assets/img/selecticon.svg" alt="faqdown">
        <div class="clearfix"></div>
    </div>
    <div class="faq-box-content">
        <?php the_field('faq_content'); ?>
    </div>            
</div>