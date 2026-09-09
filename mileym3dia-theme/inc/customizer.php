<?php
/**
 * MILEYM3DIA Theme Customizer
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 */
function mileym3dia_customize_register($wp_customize) {
    // Site Title & Description
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    
    // Selective Refresh
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => function() {
                bloginfo('name');
            },
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => function() {
                bloginfo('description');
            },
        ));
    }
    
    // ============================================
    // LOGO & BRANDING SECTION
    // ============================================
    $wp_customize->add_section('mileym3dia_branding', array(
        'title'    => __('Branding', 'mileym3dia'),
        'priority' => 20,
    ));
    
    // Alternate Logo
    $wp_customize->add_setting('mileym3dia_logo_alt', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mileym3dia_logo_alt', array(
        'label'    => __('Alternate Logo', 'mileym3dia'),
        'section'  => 'mileym3dia_branding',
        'settings' => 'mileym3dia_logo_alt',
    )));
    
    // ============================================
    // COLORS SECTION
    // ============================================
    $wp_customize->add_section('mileym3dia_colors', array(
        'title'    => __('Brand Colors', 'mileym3dia'),
        'priority' => 25,
    ));
    
    // Primary Red
    $wp_customize->add_setting('mileym3dia_color_red', array(
        'default'           => '#EF252C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mileym3dia_color_red', array(
        'label'    => __('Primary Red', 'mileym3dia'),
        'section'  => 'mileym3dia_colors',
        'settings' => 'mileym3dia_color_red',
    )));
    
    // Purple
    $wp_customize->add_setting('mileym3dia_color_purple', array(
        'default'           => '#8B38DC',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mileym3dia_color_purple', array(
        'label'    => __('Purple Accent', 'mileym3dia'),
        'section'  => 'mileym3dia_colors',
        'settings' => 'mileym3dia_color_purple',
    )));
    
    // Blue
    $wp_customize->add_setting('mileym3dia_color_blue', array(
        'default'           => '#258DFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mileym3dia_color_blue', array(
        'label'    => __('Blue Accent', 'mileym3dia'),
        'section'  => 'mileym3dia_colors',
        'settings' => 'mileym3dia_color_blue',
    )));
    
    // Lime
    $wp_customize->add_setting('mileym3dia_color_lime', array(
        'default'           => '#D4F329',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mileym3dia_color_lime', array(
        'label'    => __('Lime Accent', 'mileym3dia'),
        'section'  => 'mileym3dia_colors',
        'settings' => 'mileym3dia_color_lime',
    )));
    
    // Background Color
    $wp_customize->add_setting('mileym3dia_bg_color', array(
        'default'           => '#0a0a0a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mileym3dia_bg_color', array(
        'label'    => __('Background Color', 'mileym3dia'),
        'section'  => 'mileym3dia_colors',
        'settings' => 'mileym3dia_bg_color',
    )));
    
    // Text Color
    $wp_customize->add_setting('mileym3dia_text_color', array(
        'default'           => '#f5f5f5',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mileym3dia_text_color', array(
        'label'    => __('Text Color', 'mileym3dia'),
        'section'  => 'mileym3dia_colors',
        'settings' => 'mileym3dia_text_color',
    )));
    
    // ============================================
    // HEADER SETTINGS
    // ============================================
    $wp_customize->add_section('mileym3dia_header', array(
        'title'    => __('Header Settings', 'mileym3dia'),
        'priority' => 30,
    ));
    
    // Sticky Header
    $wp_customize->add_setting('mileym3dia_sticky_header', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_sticky_header', array(
        'type'     => 'checkbox',
        'label'    => __('Enable Sticky Header', 'mileym3dia'),
        'section'  => 'mileym3dia_header',
        'settings' => 'mileym3dia_sticky_header',
    ));
    
    // Header CTA Text
    $wp_customize->add_setting('mileym3dia_header_cta_text', array(
        'default'           => __('Get in Touch', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_header_cta_text', array(
        'type'     => 'text',
        'label'    => __('Header CTA Text', 'mileym3dia'),
        'section'  => 'mileym3dia_header',
        'settings' => 'mileym3dia_header_cta_text',
    ));
    
    // Header CTA URL
    $wp_customize->add_setting('mileym3dia_header_cta_url', array(
        'default'           => '/contact/',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_header_cta_url', array(
        'type'     => 'url',
        'label'    => __('Header CTA URL', 'mileym3dia'),
        'section'  => 'mileym3dia_header',
        'settings' => 'mileym3dia_header_cta_url',
    ));
    
    // ============================================
    // HERO SETTINGS
    // ============================================
    $wp_customize->add_section('mileym3dia_hero', array(
        'title'    => __('Hero Section', 'mileym3dia'),
        'priority' => 35,
    ));
    
    // Hero Eyebrow
    $wp_customize->add_setting('mileym3dia_hero_eyebrow', array(
        'default'           => __('CREATIVE MEDIA', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_eyebrow', array(
        'type'     => 'text',
        'label'    => __('Hero Eyebrow', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_eyebrow',
    ));
    
    // Hero Headline 1
    $wp_customize->add_setting('mileym3dia_hero_headline_1', array(
        'default'           => __('MILEYM3DIA', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_headline_1', array(
        'type'     => 'text',
        'label'    => __('Hero Headline (Line 1)', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_headline_1',
    ));
    
    // Hero Headline 2
    $wp_customize->add_setting('mileym3dia_hero_headline_2', array(
        'default'           => __('MUSIC. DESIGN. DIGITAL.', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_headline_2', array(
        'type'     => 'text',
        'label'    => __('Hero Headline (Line 2)', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_headline_2',
    ));
    
    // Hero Description
    $wp_customize->add_setting('mileym3dia_hero_description', array(
        'default'           => __('CREATE. CAPTURE. ELEVATE.', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_description', array(
        'type'     => 'textarea',
        'label'    => __('Hero Description', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_description',
    ));
    
    // Hero Primary CTA
    $wp_customize->add_setting('mileym3dia_hero_cta_primary', array(
        'default'           => __('Explore Work', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_cta_primary', array(
        'type'     => 'text',
        'label'    => __('Primary CTA Text', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_cta_primary',
    ));
    
    // Hero Primary CTA URL
    $wp_customize->add_setting('mileym3dia_hero_cta_primary_url', array(
        'default'           => '/portfolio/',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_cta_primary_url', array(
        'type'     => 'url',
        'label'    => __('Primary CTA URL', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_cta_primary_url',
    ));
    
    // Hero Secondary CTA
    $wp_customize->add_setting('mileym3dia_hero_cta_secondary', array(
        'default'           => __('Contact Us', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_cta_secondary', array(
        'type'     => 'text',
        'label'    => __('Secondary CTA Text', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_cta_secondary',
    ));
    
    // Hero Secondary CTA URL
    $wp_customize->add_setting('mileym3dia_hero_cta_secondary_url', array(
        'default'           => '/contact/',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_cta_secondary_url', array(
        'type'     => 'url',
        'label'    => __('Secondary CTA URL', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_cta_secondary_url',
    ));
    
    // Hero Alignment
    $wp_customize->add_setting('mileym3dia_hero_alignment', array(
        'default'           => 'left',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_alignment', array(
        'type'     => 'select',
        'label'    => __('Hero Content Alignment', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_alignment',
        'choices'  => array(
            'left'   => __('Left', 'mileym3dia'),
            'center' => __('Center', 'mileym3dia'),
            'right'  => __('Right', 'mileym3dia'),
        ),
    ));
    
    // Hero Height
    $wp_customize->add_setting('mileym3dia_hero_height', array(
        'default'           => '100vh',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_height', array(
        'type'     => 'text',
        'label'    => __('Hero Height (e.g., 100vh, 800px)', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_height',
    ));
    
    // Hero Animation
    $wp_customize->add_setting('mileym3dia_hero_animation', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_hero_animation', array(
        'type'     => 'checkbox',
        'label'    => __('Enable Hero Animations', 'mileym3dia'),
        'section'  => 'mileym3dia_hero',
        'settings' => 'mileym3dia_hero_animation',
    ));
    
    // ============================================
    // HOMEPAGE SECTIONS
    // ============================================
    $wp_customize->add_section('mileym3dia_homepage_sections', array(
        'title'    => __('Homepage Sections', 'mileym3dia'),
        'priority' => 40,
    ));
    
    // Show Brand Statement
    $wp_customize->add_setting('mileym3dia_show_brand_statement', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_show_brand_statement', array(
        'type'     => 'checkbox',
        'label'    => __('Show Brand Statement', 'mileym3dia'),
        'section'  => 'mileym3dia_homepage_sections',
        'settings' => 'mileym3dia_show_brand_statement',
    ));
    
    // Show Selected Work
    $wp_customize->add_setting('mileym3dia_show_selected_work', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_show_selected_work', array(
        'type'     => 'checkbox',
        'label'    => __('Show Selected Work', 'mileym3dia'),
        'section'  => 'mileym3dia_homepage_sections',
        'settings' => 'mileym3dia_show_selected_work',
    ));
    
    // Show Capabilities
    $wp_customize->add_setting('mileym3dia_show_capabilities', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_show_capabilities', array(
        'type'     => 'checkbox',
        'label'    => __('Show Capabilities', 'mileym3dia'),
        'section'  => 'mileym3dia_homepage_sections',
        'settings' => 'mileym3dia_show_capabilities',
    ));
    
    // Show About Preview
    $wp_customize->add_setting('mileym3dia_show_about_preview', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_show_about_preview', array(
        'type'     => 'checkbox',
        'label'    => __('Show About Preview', 'mileym3dia'),
        'section'  => 'mileym3dia_homepage_sections',
        'settings' => 'mileym3dia_show_about_preview',
    ));
    
    // Show Services
    $wp_customize->add_setting('mileym3dia_show_services', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_show_services', array(
        'type'     => 'checkbox',
        'label'    => __('Show Services', 'mileym3dia'),
        'section'  => 'mileym3dia_homepage_sections',
        'settings' => 'mileym3dia_show_services',
    ));
    
    // Show Resources
    $wp_customize->add_setting('mileym3dia_show_resources', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_show_resources', array(
        'type'     => 'checkbox',
        'label'    => __('Show Resources', 'mileym3dia'),
        'section'  => 'mileym3dia_homepage_sections',
        'settings' => 'mileym3dia_show_resources',
    ));
    
    // Show Blog
    $wp_customize->add_setting('mileym3dia_show_blog', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_show_blog', array(
        'type'     => 'checkbox',
        'label'    => __('Show Blog', 'mileym3dia'),
        'section'  => 'mileym3dia_homepage_sections',
        'settings' => 'mileym3dia_show_blog',
    ));
    
    // Show Contact CTA
    $wp_customize->add_setting('mileym3dia_show_contact_cta', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_show_contact_cta', array(
        'type'     => 'checkbox',
        'label'    => __('Show Contact CTA', 'mileym3dia'),
        'section'  => 'mileym3dia_homepage_sections',
        'settings' => 'mileym3dia_show_contact_cta',
    ));
    
    // ============================================
    // PORTFOLIO SETTINGS
    // ============================================
    $wp_customize->add_section('mileym3dia_portfolio', array(
        'title'    => __('Portfolio Settings', 'mileym3dia'),
        'priority' => 45,
    ));
    
    // Portfolio Title
    $wp_customize->add_setting('mileym3dia_portfolio_title', array(
        'default'           => __('Selected Work', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_portfolio_title', array(
        'type'     => 'text',
        'label'    => __('Portfolio Section Title', 'mileym3dia'),
        'section'  => 'mileym3dia_portfolio',
        'settings' => 'mileym3dia_portfolio_title',
    ));
    
    // Portfolio Count
    $wp_customize->add_setting('mileym3dia_portfolio_count', array(
        'default'           => 6,
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_portfolio_count', array(
        'type'     => 'number',
        'label'    => __('Number of Projects', 'mileym3dia'),
        'section'  => 'mileym3dia_portfolio',
        'settings' => 'mileym3dia_portfolio_count',
        'input_attrs' => array(
            'min' => 1,
            'max' => 20,
        ),
    ));
    
    // ============================================
    // SERVICES SETTINGS
    // ============================================
    $wp_customize->add_section('mileym3dia_services', array(
        'title'    => __('Services Settings', 'mileym3dia'),
        'priority' => 50,
    ));
    
    // Services Title
    $wp_customize->add_setting('mileym3dia_services_title', array(
        'default'           => __('Creative Disciplines', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_services_title', array(
        'type'     => 'text',
        'label'    => __('Services Section Title', 'mileym3dia'),
        'section'  => 'mileym3dia_services',
        'settings' => 'mileym3dia_services_title',
    ));
    
    // Services Description
    $wp_customize->add_setting('mileym3dia_services_description', array(
        'default'           => __('End-to-end creative production across multiple disciplines.', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_services_description', array(
        'type'     => 'textarea',
        'label'    => __('Services Section Description', 'mileym3dia'),
        'section'  => 'mileym3dia_services',
        'settings' => 'mileym3dia_services_description',
    ));
    
    // ============================================
    // ABOUT SETTINGS
    // ============================================
    $wp_customize->add_section('mileym3dia_about', array(
        'title'    => __('About Settings', 'mileym3dia'),
        'priority' => 55,
    ));
    
    // About Title
    $wp_customize->add_setting('mileym3dia_about_title', array(
        'default'           => __('Who We Are', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_about_title', array(
        'type'     => 'text',
        'label'    => __('About Section Title', 'mileym3dia'),
        'section'  => 'mileym3dia_about',
        'settings' => 'mileym3dia_about_title',
    ));
    
    // About Content
    $wp_customize->add_setting('mileym3dia_about_content', array(
        'default'           => __('MILEYM3DIA is a creative media brand operating at the intersection of visual design, music, and digital culture.', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_about_content', array(
        'type'     => 'textarea',
        'label'    => __('About Section Content', 'mileym3dia'),
        'section'  => 'mileym3dia_about',
        'settings' => 'mileym3dia_about_content',
    ));
    
    // ============================================
    // RESOURCES SETTINGS
    // ============================================
    $wp_customize->add_section('mileym3dia_resources', array(
        'title'    => __('Resources Settings', 'mileym3dia'),
        'priority' => 60,
    ));
    
    // Resources Title
    $wp_customize->add_setting('mileym3dia_resources_title', array(
        'default'           => __('Insights & Tools', 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_resources_title', array(
        'type'     => 'text',
        'label'    => __('Resources Section Title', 'mileym3dia'),
        'section'  => 'mileym3dia_resources',
        'settings' => 'mileym3dia_resources_title',
    ));
    
    // ============================================
    // CONTACT SETTINGS
    // ============================================
    $wp_customize->add_section('mileym3dia_contact', array(
        'title'    => __('Contact Settings', 'mileym3dia'),
        'priority' => 65,
    ));
    
    // Contact Email
    $wp_customize->add_setting('mileym3dia_contact_email', array(
        'default'           => 'hello@mileym3dia.com',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_contact_email', array(
        'type'     => 'email',
        'label'    => __('Contact Email', 'mileym3dia'),
        'section'  => 'mileym3dia_contact',
        'settings' => 'mileym3dia_contact_email',
    ));
    
    // Contact CTA Text
    $wp_customize->add_setting('mileym3dia_contact_cta', array(
        'default'           => __("Let's Create Together", 'mileym3dia'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_contact_cta', array(
        'type'     => 'text',
        'label'    => __('Contact CTA Heading', 'mileym3dia'),
        'section'  => 'mileym3dia_contact',
        'settings' => 'mileym3dia_contact_cta',
    ));
    
    // ============================================
    // FOOTER SETTINGS
    // ============================================
    $wp_customize->add_section('mileym3dia_footer', array(
        'title'    => __('Footer Settings', 'mileym3dia'),
        'priority' => 70,
    ));
    
    // Footer Copyright
    $wp_customize->add_setting('mileym3dia_footer_copyright', array(
        'default'           => __('&copy; ' . date('Y') . ' MILEYM3DIA. All rights reserved.', 'mileym3dia'),
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('mileym3dia_footer_copyright', array(
        'type'     => 'text',
        'label'    => __('Footer Copyright Text', 'mileym3dia'),
        'section'  => 'mileym3dia_footer',
        'settings' => 'mileym3dia_footer_copyright',
    ));
    
    // ============================================
    // SOCIAL LINKS
    // ============================================
    $wp_customize->add_section('mileym3dia_social', array(
        'title'    => __('Social Links', 'mileym3dia'),
        'priority' => 75,
    ));
    
    $social_platforms = array(
        'instagram' => 'Instagram',
        'twitter'   => 'Twitter/X',
        'facebook'  => 'Facebook',
        'linkedin'  => 'LinkedIn',
        'youtube'   => 'YouTube',
        'vimeo'     => 'Vimeo',
        'behance'   => 'Behance',
        'dribbble'  => 'Dribbble',
        'tiktok'    => 'TikTok',
    );
    
    foreach ($social_platforms as $platform => $label) {
        $wp_customize->add_setting('mileym3dia_social_' . $platform, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));
        
        $wp_customize->add_control('mileym3dia_social_' . $platform, array(
            'type'     => 'url',
            'label'    => sprintf(__('%s URL', 'mileym3dia'), $label),
            'section'  => 'mileym3dia_social',
            'settings' => 'mileym3dia_social_' . $platform,
        ));
    }
}
add_action('customize_register', 'mileym3dia_customize_register');

/**
 * Enqueue customizer preview scripts.
 */
function mileym3dia_customizer_preview_js() {
    wp_enqueue_script('mileym3dia-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), MILEYM3DIA_VERSION, true);
}
add_action('customize_preview_init', 'mileym3dia_customizer_preview_js');
