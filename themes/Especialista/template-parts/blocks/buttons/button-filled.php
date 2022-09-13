<?php

/**
 * Botón principal relleno Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

$className = 'button-primary-filled';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
?>

<div class="aligcenter <?php echo $className; ?>">
    <a class="" href="<?php echo get_field('btn_filled_url'); ?>"><?php echo get_field('btn_filled_text'); ?></a>
</div>