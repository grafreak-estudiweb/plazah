<?php
// Enqueue extra scripts
function add_theme_scripts()
{
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), true);

    wp_enqueue_script(
        'support-cat',
        get_template_directory_uri() . '/assets/js/categories-extra.js',
        array('jquery'),
        1.1,
        true
    );
    wp_enqueue_script(
        'search-engine',
        get_template_directory_uri() . '/assets/js/search-engine.js',
        array('jquery')
    );

    //   wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('default', get_stylesheet_uri());
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', null, null, 'screen');
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

/*TODO: comprobar if WP.com doesn't admit admin styles? */
function admin_style()
{
    wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


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

function the_title_limit($length, $replacer = '...')
{
    $string = get_the_title('', '', FALSE);
    if (strlen($string) > $length)
        $string = (preg_match('/^(.*)\W.*$/', substr($string, 0, $length + 1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
    return $string;
}

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_theme_support('align-wide');
    add_theme_support('disable-custom-colors');
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Color Marca', 'ea_genesis_child'),
            'slug'  => 'brand',
            'color'    => '#FC2561',
        ),
        array(
            'name'  => __('Texto principal', 'ea_genesis_child'),
            'slug'  => 'gray-darkest',
            'color' => '#20313A',
        ),
        array(
            'name'  => __('Texto secundario', 'ea_genesis_child'),
            'slug'  => 'secondary',
            'color' => '#319ce7',
        ),
        array(
            'name'    => __('Destacado secundario', 'ea_genesis_child'),
            'slug'    => 'secondary-default',
            'color'    => '#319CE7',
        ),
    ));
}




//wp_enqueue_script('support', bloginfo('template_url') . "/js/categories-extra.js");


// Resizing of post featured image
$width = 150;
$height = 150;
$crop = true;
set_post_thumbnail_size($width, $height, $crop);


// TODO: delete after changes NRA
/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');
