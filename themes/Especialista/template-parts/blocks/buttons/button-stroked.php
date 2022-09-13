<?php

/**
 * Botón fondo transparante usado en producto Block Template.
 *
 */

$className = 'button-primary-stroked';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

?>

<div class="<?php echo $className; ?>">
    <a href="<?php echo get_field('btn_stroked_url'); ?>"><?php echo get_field('btn_stroked_text'); ?></a>
</div>