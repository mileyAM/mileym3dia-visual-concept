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

<div class="scroll-progress" id="scrollProgress"></div>

<header class="site-header" id="siteHeader">
    <div class="container header-inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            MILEYM3DIA
        </a>
        
        <nav class="nav-primary" id="navPrimary">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-primary',
                'container'      => false,
                'depth'          => 1,
            ));
            ?>
        </nav>
        
        <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<nav class="nav-mobile" id="navMobile">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class'     => '',
        'container'      => false,
        'depth'          => 1,
    ));
    ?>
    <button class="mobile-menu-toggle" id="mobileMenuClose" aria-label="Close Menu" style="position: absolute; top: 20px; right: 20px;">
        <span style="transform: rotate(45deg);"></span>
        <span style="transform: rotate(-45deg); margin-top: -10px;"></span>
    </button>
</nav>
