<?php

/**
 * Plugin Name: Plazah Patterns
 * Description: Plazah block patterns
 * Version: 1.0.0
 */
defined('ABSPATH') or die();
function plazah_patterns_register_block_patterns()
{
    if (!class_exists('WP_Block_Patterns_Registry')) {
        return;
    }
    register_block_pattern(
        'plazah-gutenberg-blocks-patterns/list-products',
        array(
            'title'    => __('Sección Ranking Productos', 'plazah'),
            'categories' => ['featured'],
            'description' => "Para insertar cuando se crea un nuevo post que va a ser un listado de artículos. Luego usar el 'Bloque 1 Producto' para añadir más productos.",
            'content'  => "<!-- wp:group {\"className\":\"products-list\"} -->\n<div class=\"wp-block-group products-list\"><!-- wp:group {\"tagName\":\"article\",\"className\":\"group-product\"} -->\n<article class=\"wp-block-group group-product\"><!-- wp:heading -->\n<h2>Nombre del producto.</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Descripción corta del producto.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"align\":\"center\",\"id\":836,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-large\"><img src=\"https://especialistaenbelleza.blog/wp-content/uploads/2022/08/placeholder-1024x640.png\" alt=\"\" class=\"wp-image-836\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#fc2561\"},\"border\":{\"radius\":\"5px\"}},\"className\":\"btn-ver-prod is-style-outline\"} -->\n<div class=\"wp-block-button btn-ver-prod is-style-outline\"><a class=\"wp-block-button__link has-text-color wp-element-button\" style=\"border-radius:5px;color:#fc2561\">Ver producto</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:paragraph -->\n<p>Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\n<!-- /wp:paragraph --></article>\n<!-- /wp:group -->\n\n<!-- wp:group {\"tagName\":\"article\",\"className\":\"group-product\"} -->\n<article class=\"wp-block-group group-product\"><!-- wp:heading -->\n<h2>Nombre producto.</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Descripción corta del producto.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"align\":\"center\",\"id\":836,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-large\"><img src=\"https://especialistaenbelleza.blog/wp-content/uploads/2022/08/placeholder-1024x640.png\" alt=\"\" class=\"wp-image-836\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#fc2561\"},\"border\":{\"radius\":\"5px\"}},\"className\":\"btn-ver-prod is-style-outline\"} -->\n<div class=\"wp-block-button btn-ver-prod is-style-outline\"><a class=\"wp-block-button__link has-text-color wp-element-button\" style=\"border-radius:5px;color:#fc2561\">Ver producto</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:paragraph -->\n<p>Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\n<!-- /wp:paragraph --></article>\n<!-- /wp:group -->\n\n<!-- wp:group {\"tagName\":\"article\",\"className\":\"group-product\"} -->\n<article class=\"wp-block-group group-product\"><!-- wp:heading -->\n<h2>Nombre producto.</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Descripción corta del producto.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"align\":\"center\",\"id\":836,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-large\"><img src=\"https://especialistaenbelleza.blog/wp-content/uploads/2022/08/placeholder-1024x640.png\" alt=\"\" class=\"wp-image-836\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#fc2561\"},\"border\":{\"radius\":\"5px\"}},\"className\":\"btn-ver-prod is-style-outline\"} -->\n<div class=\"wp-block-button btn-ver-prod is-style-outline\"><a class=\"wp-block-button__link has-text-color wp-element-button\" style=\"border-radius:5px;color:#fc2561\">Ver producto</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:paragraph -->\n<p>Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\n<!-- /wp:paragraph --></article>\n<!-- /wp:group --></div>\n<!-- /wp:group -->",
        )
    );
    register_block_pattern(
        'plazah-gutenberg-blocks-patterns/group-product',
        array(
            'title'    => __('Bloque 1 Producto', 'plazah'),
            'categories' => ['featured'],
            'description' => "Inserta un modelo de producto para que cambies con el contenido de un nuevo producto.",
            'content'  => "<!-- wp:group {\"tagName\":\"article\",\"className\":\"group-product\"} -->\n<article class=\"wp-block-group group-product\"><!-- wp:heading -->\n<h2>Nombre del producto.</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Descripción corta del producto.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"align\":\"center\",\"id\":836,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-large\"><img src=\"https://especialistaenbelleza.blog/wp-content/uploads/2022/08/placeholder-1024x640.png\" alt=\"\" class=\"wp-image-836\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#fc2561\"},\"border\":{\"radius\":\"5px\"}},\"className\":\"btn-ver-prod is-style-outline\"} -->\n<div class=\"wp-block-button btn-ver-prod is-style-outline\"><a class=\"wp-block-button__link has-text-color wp-element-button\" style=\"border-radius:5px;color:#fc2561\">Ver producto</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:paragraph -->\n<p>Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\n<!-- /wp:paragraph --></article>\n<!-- /wp:group -->",
        )
    );

    register_block_pattern(
        'plazah-gutenberg-blocks-patterns/evento',
        array(
            'title'    => __('Bloque Imagen + Botón', 'plazah'),
            'categories' => ['featured'],
            'description' => "",
            'content'  => "<!-- wp:image {\"align\":\"wide\",\"id\":836,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image alignwide size-large\"><img src=\"https://especialistaenbelleza.blog/wp-content/uploads/2022/08/placeholder-1024x640.png\" alt=\"\" class=\"wp-image-836\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#747a7b\"}},\"className\":\"secondary-text\"} -->\n<p class=\"secondary-text has-text-color\" style=\"color:#747a7b\">Expertas y L’Oréal París te invitan el proximo 12 de abril a una masterclass de maquillaje para el rostro.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"white\",\"style\":{\"color\":{\"background\":\"#fc2561\"},\"border\":{\"radius\":\"5px\"}},\"className\":\"primary-btn is-style-fill\"} -->\n<div class=\"wp-block-button primary-btn is-style-fill\"><a class=\"wp-block-button__link has-white-color has-text-color has-background wp-element-button\" style=\"border-radius:5px;background-color:#fc2561\">APUNTARME A LA MASTERCLASS</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
        )
    );
}
add_action('init', 'plazah_patterns_register_block_patterns');
