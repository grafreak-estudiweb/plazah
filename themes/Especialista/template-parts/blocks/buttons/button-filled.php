<?php

/**
 * Botón principal relleno Block Template.
 *
 */

$className = 'btn-primary-filled';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
?>

<div class="<?php echo $className; ?>">
    <a class="" href="<?php echo get_field('btn_filled_url'); ?>"><?php echo get_field('btn_filled_text'); ?></a>
</div>