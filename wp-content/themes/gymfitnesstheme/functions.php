<?php

include(get_template_directory() . '/inc/post_types.php');
include(get_template_directory() . '/inc/gymfitnes_widget.php');

function fitness_menus(){
  register_nav_menus(array(
      'main-menu' => 'Main Menu',
      'footer-menu' => 'Footer Menu',
  ));
}

add_action('init', 'fitness_menus');


function fitness_scripts(){
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap"', array(), '1.0.0');
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'google-fonts'), '1.0.0');
    wp_enqueue_style('slicknav', get_template_directory_uri() . '/css/lib/slicknav.min.css', array(), '1.0.10');

    if( basename( get_page_template() ) === 'gallery.php'):
        wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.3');
    endif;

    wp_enqueue_script('jquery');
    wp_enqueue_script('slicknav-js', get_template_directory_uri() . '/js/lib/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true );

    if( basename( get_page_template() ) === 'gallery.php'):
        wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.3', true);
    endif;

    if (is_page('contact-us')):
        wp_enqueue_style('leaflet', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css', array(), '1.7.1');
        wp_enqueue_script('leafletjs', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', array(), '1.7.1', true);
        wp_enqueue_script('leaflet-custom-script', get_template_directory_uri() . '/js/leaflet-custom-script.js', array('leafletjs'), '1.0.0', true);
    endif;

    if (is_front_page()) :
        wp_enqueue_style('bxSliderCss', "https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css", array(), '4.2.12');
        wp_enqueue_script('bxSliderjs', "https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js", array('jquery'), '4.2.12', true);
    endif;
}

add_action('wp_enqueue_scripts', 'fitness_scripts');


function fitness_setup() {

    // Register new image size
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('box', 400, 375, true);
    add_image_size('mediumSize', 700, 400, true );
    add_image_size('blog', 966, 644, true);

    // Add featured image
    add_theme_support('post-thumbnails');

    // SEO Titles
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'fitness_setup'); // When the theme is activated and ready!

function fitness_widgets(){
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-primary">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'fitness_widgets');


function fitness_hero_image(){
    $front_page_id = get_option('page_on_front');
    $hero_image = get_field('hero_image', $front_page_id);

    $hero_image_url = $hero_image['url'];

    // Create "FALSE" stylesheet
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $featured_image_css = "
        body.home .site-header {
            background-image: linear-gradient( rgba(0,0,0,0.75) , rgba(0,0,0,0.75) ), url($hero_image_url);
        }
    ";
    wp_add_inline_style('custom', $featured_image_css);
}

add_action('init', 'fitness_hero_image');