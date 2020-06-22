<?php

/**
 * Single Job Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'thepilatesroom-single-job-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'thepilatesroom-single-job';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('job_title') ?: 'Your title here...';
$tags = get_field('job_tags') ?: 'Tags about job';
$excerpt = get_field('job_excerpt') ?: 'Excerpt';
$link = get_field('job_link') ?: 'https://yourlink.com'

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <span class="job-title"><?php echo $title; ?></span>
        <span class="job-tags"><?php echo $tags; ?></span>
        <span class="job-excerpt"><?php echo $excerpt; ?></span>
        <a class="thepilatesroom-button" href="<?php echo $link; ?>" target="_blank"><?php echo esc_html__("Read more", "thepilatesroom"); ?><span class="square"></span></a>
</div>
