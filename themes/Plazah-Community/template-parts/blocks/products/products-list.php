<?php

/**
 * Lista Productos Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

$className = 'products-list';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

if (have_rows('pz_products_list')) : ?>
    <div class="<?php echo $className; ?>">
        <?php
        // Loop through rows.
        while (have_rows('pz_products_list')) : the_row(); ?>
            <article class="group-product">
                <h2><?php echo get_sub_field('pz_product_title'); ?></h2>
                <p><?php echo get_sub_field('pz_product_subtitle'); ?></p>

                <figure class="">
                    <?php
                    $image = get_sub_field('pz_product_img');
                    $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                    if ($image) {
                        echo wp_get_attachment_image($image, $size);
                    }
                    ?>
                </figure>
                <div class="btn-secondary-stroked">
                    <a href="<?php echo get_sub_field('pz_product_btn_url'); ?>"><?php echo get_sub_field('pz_product_btn_text'); ?></a>
                </div>
                <div class="content-product">
                    <?php echo get_sub_field('pz_product_desc'); ?>
                </div>

            </article>
        <?php
        endwhile; ?>
    </div>
<?php

// No value.
else :
// Do something...
endif;

?>