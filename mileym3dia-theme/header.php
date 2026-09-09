<?php
/**
 * Header Template
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'mileym3dia'); ?></a>

    <header id="siteHeader" class="site-header <?php echo get_theme_mod('mileym3dia_sticky_header', true) ? 'sticky' : ''; ?>" role="banner">
        <div class="header-container">
            <div class="header-left">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <div class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <nav id="siteNavigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'mileym3dia'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'depth'          => 2,
                    'walker'         => new Mileym3dia_Walker_Nav_Menu(),
                ));
                ?>
            </nav>

            <div class="header-right">
                <?php if (is_active_sidebar('header-1')) : ?>
                    <div class="header-widgets">
                        <?php dynamic_sidebar('header-1'); ?>
                    </div>
                <?php endif; ?>

                <?php
                $cta_text = get_theme_mod('mileym3dia_header_cta_text', __('Get in Touch', 'mileym3dia'));
                $cta_url = get_theme_mod('mileym3dia_header_cta_url', '/contact/');
                if ($cta_text && $cta_url) :
                ?>
                    <a href="<?php echo esc_url($cta_url); ?>" class="btn btn--primary header-cta">
                        <?php echo esc_html($cta_text); ?>
                    </a>
                <?php endif; ?>

                <button 
                    id="mobileMenuToggle"
                    class="mobile-menu-toggle"
                    aria-expanded="false"
                    aria-controls="navMobile"
                    aria-label="<?php esc_attr_e('Open menu', 'mileym3dia'); ?>"
                >
                    <?php mileym3dia_icon('menu'); ?>
                    <?php mileym3dia_icon('close'); ?>
                </button>
            </div>
        </div>
    </header>

    <nav id="navMobile" class="mobile-navigation" aria-hidden="true" role="navigation" aria-label="<?php esc_attr_e('Mobile Menu', 'mileym3dia'); ?>">
        <div class="mobile-nav-inner">
            <div class="mobile-nav-header">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <div class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </div>
                <?php endif; ?>
                <button 
                    id="mobileMenuClose"
                    class="mobile-menu-close"
                    aria-label="<?php esc_attr_e('Close menu', 'mileym3dia'); ?>"
                >
                    <?php mileym3dia_icon('close'); ?>
                </button>
            </div>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'mobile',
                'menu_class'     => 'mobile-nav-menu',
                'container'      => false,
                'depth'          => 2,
                'walker'         => new Mileym3dia_Walker_Nav_Menu(),
            ));
            ?>

            <?php if (has_nav_menu('social')) : ?>
                <div class="mobile-social">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'social',
                        'menu_class'     => 'social-links',
                        'container'      => false,
                        'link_before'    => '<span class="screen-reader-text">',
                        'link_after'     => '</span>',
                    ));
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </nav>
