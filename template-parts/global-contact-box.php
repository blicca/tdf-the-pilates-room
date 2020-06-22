<?php

/**
 * Contact Box Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'thepilatesroom-contact-box-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'thepilatesroom-contact-box';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('contact_box_title') ?: 'Name';
$contact_box_subtitle = get_field('contact_box_subtitle') ?: 'Partner?';
$contact_box_phone = get_field('contact_box_phone') ?: '+XX XXX XXX XXX';
$image = get_field('contact_box_photo') ?: 'https://yourlink.com';
$customemail = get_field('contact_box_email') ?: 'info@thepilatesroom.com.au';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="contact-box-photo"><img src="<?php echo $image; ?>"></div>
    <div class="contact-box-right">
        <div class="contact-box-title"><?php echo $title; ?></div>
        <div class="contact-box-subtitle"><?php echo $contact_box_subtitle; ?></div>
        <div class="contact-box-phone"><span><?php echo $contact_box_phone; ?></span></div>
        <div class="contact-box-email"><a href="mailto:<?php echo $customemail; ?>"><?php echo $customemail; ?></a></div>
    </div>        
</div>
