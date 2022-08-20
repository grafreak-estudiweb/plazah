<?php

// Category Pills
if (function_exists('register_nav_menus')) {
    register_nav_menus(array('cat-pills' => 'Category Pills'));
}

// nav items pills
add_filter('nav_menu_link_attributes', 'category_pills', 10, 3);

function category_pills($atts, $item, $args)
{
    $class = 'nav-link font-12 bolder';
    $atts['class'] = $class;
    return $atts;
}

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_theme_support('align-wide');
    /*    add_theme_support('disable-custom-colors');
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Color Marca', 'ea_genesis_child'),
            'slug'  => 'brand',
            'color'    => '#FC2561',
        ),
        array(
            'name'  => __('Texto principal', 'ea_genesis_child'),
            'slug'  => 'primary-text',
            'color' => '#20313A',
        ),
        array(
            'name'  => __('Texto secundario', 'ea_genesis_child'),
            'slug'  => 'secondary-text',
            'color' => '#747A7B',
        ),
        array(
            'name'    => __('Destacado secundario', 'ea_genesis_child'),
            'slug'    => 'secondary-default',
            'color'    => '#319CE7',
        ),
    )); */
}




//wp_enqueue_script('support', bloginfo('template_url') . "/js/categories-extra.js");

// Enqueue extra scripts
function add_theme_scripts()
{
    wp_enqueue_script(
        'support-cat',
        get_template_directory_uri() . '/js/categories-extra.js',
        array('jquery'),
        1.1,
        true
    );
    wp_enqueue_script(
        'search-engine',
        get_template_directory_uri() . '/js/search-engine.js',
        array('jquery')
    );
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

// Resizing of post featured image
$width = 150;
$height = 150;
$crop = true;
set_post_thumbnail_size($width, $height, $crop);


// TODO: delete after changes NRA
/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');
