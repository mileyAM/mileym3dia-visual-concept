<?php
/**
 * MILEYM3DIA Theme Functions
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function mileym3dia_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mileym3dia'),
        'footer'  => __('Footer Menu', 'mileym3dia'),
    ));
    
    set_post_thumbnail_size(1920, 1080, true);
    add_image_size('mileym3dia-hero', 2400, 1350, true);
    add_image_size('mileym3dia-large', 1600, 900, true);
    add_image_size('mileym3dia-medium', 800, 600, true);
    add_image_size('mileym3dia-small', 400, 300, true);
}
add_action('after_setup_theme', 'mileym3dia_setup');

// Enqueue scripts and styles
function mileym3dia_scripts() {
    wp_enqueue_style('mileym3dia-style', get_stylesheet_uri(), array(), MILEYM3DIA_VERSION);
    wp_enqueue_style('mileym3dia-main', get_template_directory_uri() . '/css/main.css', array(), MILEYM3DIA_VERSION);
    
    wp_enqueue_script('mileym3dia-main', get_template_directory_uri() . '/js/main.js', array(), MILEYM3DIA_VERSION, true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mileym3dia_scripts');

// Custom body classes
function mileym3dia_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    if (is_singular()) {
        $classes[] = 'singular-page';
    }
    return $classes;
}
add_filter('body_class', 'mileym3dia_body_classes');

// Excerpt length
function mileym3dia_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'mileym3dia_excerpt_length', 999);

// Excerpt more
function mileym3dia_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'mileym3dia_excerpt_more');

// Remove WordPress version
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// Custom excerpt for portfolio
function mileym3dia_custom_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(' ', $excerpt) . '...';
    } else {
        $excerpt = implode(' ', $excerpt);
    }
    return $excerpt;
}

// Register widget areas
function mileym3dia_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'mileym3dia'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'mileym3dia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer', 'mileym3dia'),
        'id'            => 'footer-1',
        'description'   => __('Footer widgets.', 'mileym3dia'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'mileym3dia_widgets_init');
