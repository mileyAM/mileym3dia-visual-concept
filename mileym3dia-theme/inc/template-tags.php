<?php
/**
 * Custom template tags for this theme
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Display SVG icons.
 */
function mileym3dia_icon($name, $class = '') {
    $icons = array(
        'arrow-right' => '<svg class="icon icon-arrow-right ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>',
        'arrow-left' => '<svg class="icon icon-arrow-left ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>',
        'arrow-down' => '<svg class="icon icon-arrow-down ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>',
        'menu' => '<svg class="icon icon-menu ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>',
        'close' => '<svg class="icon icon-close ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>',
        'instagram' => '<svg class="icon icon-instagram ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
        'twitter' => '<svg class="icon icon-twitter ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>',
        'facebook' => '<svg class="icon icon-facebook ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>',
        'linkedin' => '<svg class="icon icon-linkedin ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>',
        'youtube' => '<svg class="icon icon-youtube ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>',
        'vimeo' => '<svg class="icon icon-vimeo ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15c-1.5 0-2.5-.5-3-1.5-.5-1-.75-2.5-.75-4.5 0-2.5.5-4.5 1.5-6 .5-.75 1.25-1.25 2.25-1.5.5-.12 1-.18 1.5-.18 1.5 0 2.75.5 3.75 1.5.5.5.75 1.25.75 2.25 0 .5-.12 1-.37 1.5-.25.5-.75 1-1.5 1.5.75.25 1.25.75 1.5 1.5.25.5.37 1.25.37 2.25 0 1.5-.5 2.75-1.5 3.75-1 1-2.25 1.5-3.75 1.5z"/></svg>',
        'behance' => '<svg class="icon icon-behance ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 7h-7V5h7v2zm0 4h-7v2h7v-2zm-7-6H5v14h10c2.21 0 4-1.79 4-4s-1.79-4-4-4c1.1 0 2-.9 2-2s-.9-2-2-2zm-3 8h3c1.1 0 2 .9 2 2s-.9 2-2 2h-3v-4zm0-4h3c1.1 0 2 .9 2 2s-.9 2-2 2h-3V9z"/></svg>',
        'dribbble' => '<svg class="icon icon-dribbble ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8.56 2.75c4.37 6.03 6.02 9.42 8.03 17.72m2.54-15.38c-3.72 4.35-8.94 5.66-16.88 5.85m19.5 1.9c-3.5-.93-6.63-.82-8.94 0-2.58.92-5.01 2.86-7.44 6.32"/></svg>',
        'tiktok' => '<svg class="icon icon-tiktok ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5v4a9 9 0 0 1-9-9v12z"/></svg>',
        'play' => '<svg class="icon icon-play ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>',
        'external' => '<svg class="icon icon-external ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>',
        'mail' => '<svg class="icon icon-mail ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22 6 12 13 2 6"/></svg>',
        'location' => '<svg class="icon icon-location ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        'check' => '<svg class="icon icon-check ' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>',
    );

    if (isset($icons[$name])) {
        echo $icons[$name];
    }
}

/**
 * Display social links.
 */
function mileym3dia_social_links($class = '') {
    $social_platforms = array(
        'instagram' => get_theme_mod('mileym3dia_social_instagram'),
        'twitter'   => get_theme_mod('mileym3dia_social_twitter'),
        'facebook'  => get_theme_mod('mileym3dia_social_facebook'),
        'linkedin'  => get_theme_mod('mileym3dia_social_linkedin'),
        'youtube'   => get_theme_mod('mileym3dia_social_youtube'),
        'vimeo'     => get_theme_mod('mileym3dia_social_vimeo'),
        'behance'   => get_theme_mod('mileym3dia_social_behance'),
        'dribbble'  => get_theme_mod('mileym3dia_social_dribbble'),
        'tiktok'    => get_theme_mod('mileym3dia_social_tiktok'),
    );

    $output = '<ul class="social-links ' . esc_attr($class) . '">';
    foreach ($social_platforms as $platform => $url) {
        if (!empty($url)) {
            $output .= '<li class="social-link social-link-' . esc_attr($platform) . '">';
            $output .= '<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr(ucfirst($platform)) . '">';
            mileym3dia_icon($platform);
            $output .= '</a>';
            $output .= '</li>';
        }
    }
    $output .= '</ul>';

    echo $output;
}

/**
 * Display section heading with optional eyebrow and number.
 */
function mileym3dia_section_heading($args = array()) {
    $defaults = array(
        'eyebrow'       => '',
        'title'         => '',
        'description'   => '',
        'number'        => '',
        'class'         => '',
        'align'         => 'left',
        'show_line'     => true,
    );

    $args = wp_parse_args($args, $defaults);

    echo '<div class="section-heading section-heading--' . esc_attr($args['align']) . ' ' . esc_attr($args['class']) . '">';

    if (!empty($args['eyebrow'])) {
        echo '<span class="section-eyebrow">' . esc_html($args['eyebrow']) . '</span>';
    }

    if (!empty($args['number'])) {
        echo '<span class="section-number">[' . esc_html($args['number']) . ']</span>';
    }

    if (!empty($args['title'])) {
        echo '<h2 class="section-title">' . wp_kses_post($args['title']) . '</h2>';
    }

    if (!empty($args['description'])) {
        echo '<p class="section-description">' . wp_kses_post($args['description']) . '</p>';
    }

    if ($args['show_line']) {
        echo '<div class="section-line"></div>';
    }

    echo '</div>';
}

/**
 * Display button component.
 */
function mileym3dia_button($args = array()) {
    $defaults = array(
        'text'      => __('Learn More', 'mileym3dia'),
        'url'       => '#',
        'variant'   => 'primary',
        'size'      => 'medium',
        'class'     => '',
        'icon'      => '',
        'target'    => '',
        'aria'      => '',
    );

    $args = wp_parse_args($args, $defaults);

    $classes = array('btn', 'btn--' . $args['variant'], 'btn--' . $args['size']);
    if (!empty($args['class'])) {
        $classes[] = $args['class'];
    }

    $attributes = 'href="' . esc_url($args['url']) . '"';
    $attributes .= ' class="' . esc_attr(implode(' ', $classes)) . '"';

    if (!empty($args['target'])) {
        $attributes .= ' target="' . esc_attr($args['target']) . '"';
    }

    if (!empty($args['aria'])) {
        $attributes .= ' aria-label="' . esc_attr($args['aria']) . '"';
    }

    echo '<a ' . $attributes . '>';
    echo '<span class="btn-text">' . esc_html($args['text']) . '</span>';
    if (!empty($args['icon'])) {
        mileym3dia_icon($args['icon']);
    }
    echo '</a>';
}

/**
 * Display portfolio item.
 */
function mileym3dia_portfolio_item($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $post = get_post($post_id);
    if (!$post) {
        return;
    }

    setup_postdata($post);

    $thumbnail = get_the_post_thumbnail($post_id, 'mileym3dia-medium', array('class' => 'portfolio-item-image'));
    $categories = get_the_terms($post_id, 'project_category');
    $year = get_post_meta($post_id, '_project_year', true);
    ?>
    <article class="portfolio-item" data-project-id="<?php echo esc_attr($post_id); ?>">
        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="portfolio-item-link">
            <div class="portfolio-item-media">
                <?php if ($thumbnail) : ?>
                    <?php echo $thumbnail; ?>
                <?php else : ?>
                    <div class="portfolio-item-placeholder">
                        <span><?php esc_html_e('Coming Soon', 'mileym3dia'); ?></span>
                    </div>
                <?php endif; ?>
                <div class="portfolio-item-overlay"></div>
            </div>
            <div class="portfolio-item-content">
                <h3 class="portfolio-item-title"><?php echo esc_html(get_the_title()); ?></h3>
                <?php if ($categories) : ?>
                    <span class="portfolio-item-category"><?php echo esc_html($categories[0]->name); ?></span>
                <?php endif; ?>
                <?php if ($year) : ?>
                    <span class="portfolio-item-year"><?php echo esc_html($year); ?></span>
                <?php endif; ?>
            </div>
        </a>
    </article>
    <?php

    wp_reset_postdata();
}

/**
 * Display service item.
 */
function mileym3dia_service_item($args = array()) {
    $defaults = array(
        'title'       => '',
        'description' => '',
        'icon'        => '',
        'color'       => 'lime',
        'class'       => '',
    );

    $args = wp_parse_args($args, $defaults);

    echo '<div class="service-item service-item--' . esc_attr($args['color']) . ' ' . esc_attr($args['class']) . '">';

    if (!empty($args['icon'])) {
        echo '<div class="service-icon">';
        mileym3dia_icon($args['icon']);
        echo '</div>';
    }

    if (!empty($args['title'])) {
        echo '<h3 class="service-title">' . esc_html($args['title']) . '</h3>';
    }

    if (!empty($args['description'])) {
        echo '<p class="service-description">' . esc_html($args['description']) . '</p>';
    }

    echo '</div>';
}

/**
 * Display blog post card.
 */
function mileym3dia_blog_card($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $post = get_post($post_id);
    if (!$post) {
        return;
    }

    setup_postdata($post);

    $thumbnail = get_the_post_thumbnail($post_id, 'mileym3dia-medium', array('class' => 'blog-card-image'));
    $categories = get_the_category($post_id);
    $date = get_the_date();
    $author = get_the_author();
    ?>
    <article class="blog-card" data-post-id="<?php echo esc_attr($post_id); ?>">
        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="blog-card-link">
            <?php if ($thumbnail) : ?>
                <div class="blog-card-media">
                    <?php echo $thumbnail; ?>
                </div>
            <?php endif; ?>
            <div class="blog-card-content">
                <?php if ($categories) : ?>
                    <span class="blog-card-category"><?php echo esc_html($categories[0]->name); ?></span>
                <?php endif; ?>
                <h3 class="blog-card-title"><?php echo esc_html(get_the_title()); ?></h3>
                <p class="blog-card-excerpt"><?php echo mileym3dia_custom_excerpt(20); ?></p>
                <div class="blog-card-meta">
                    <span class="blog-card-date"><?php echo esc_html($date); ?></span>
                    <span class="blog-card-author"><?php echo esc_html($author); ?></span>
                </div>
            </div>
        </a>
    </article>
    <?php

    wp_reset_postdata();
}

/**
 * Display pagination.
 */
function mileym3dia_pagination($args = array()) {
    $defaults = array(
        'mid_size'  => 2,
        'prev_text' => __('Previous', 'mileym3dia'),
        'next_text' => __('Next', 'mileym3dia'),
        'class'     => '',
    );

    $args = wp_parse_args($args, $defaults);

    the_posts_pagination(array(
        'mid_size'  => $args['mid_size'],
        'prev_text' => $args['prev_text'],
        'next_text' => $args['next_text'],
        'class'     => $args['class'],
    ));
}

/**
 * Get project meta information.
 */
function mileym3dia_get_project_meta($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $meta = array(
        'year'      => get_post_meta($post_id, '_project_year', true),
        'client'    => get_post_meta($post_id, '_project_client', true),
        'services'  => get_post_meta($post_id, '_project_services', true),
        'url'       => get_post_meta($post_id, '_project_url', true),
    );

    return $meta;
}

/**
 * Display resource item.
 */
function mileym3dia_resource_item($args = array()) {
    $defaults = array(
        'title'       => '',
        'description' => '',
        'type'        => 'guide',
        'url'         => '#',
        'icon'        => '',
        'class'       => '',
    );

    $args = wp_parse_args($args, $defaults);

    echo '<div class="resource-item ' . esc_attr($args['class']) . '">';
    echo '<a href="' . esc_url($args['url']) . '" class="resource-item-link">';

    if (!empty($args['icon'])) {
        echo '<div class="resource-icon">';
        mileym3dia_icon($args['icon']);
        echo '</div>';
    }

    echo '<div class="resource-content">';
    echo '<span class="resource-type">' . esc_html($args['type']) . '</span>';
    echo '<h3 class="resource-title">' . esc_html($args['title']) . '</h3>';
    if (!empty($args['description'])) {
        echo '<p class="resource-description">' . esc_html($args['description']) . '</p>';
    }
    echo '</div>';

    echo '<div class="resource-arrow">';
    mileym3dia_icon('arrow-right');
    echo '</div>';

    echo '</a>';
    echo '</div>';
}

/**
 * Check if homepage section should be displayed.
 */
function mileym3dia_show_section($section_name) {
    return get_theme_mod('mileym3dia_show_' . $section_name, true);
}
