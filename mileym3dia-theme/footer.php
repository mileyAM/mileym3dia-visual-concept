<?php
/**
 * Footer Template
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

    <footer id="siteFooter" class="site-footer" role="contentinfo">
        <div class="footer-container">
            <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
                <div class="footer-widgets">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <div class="footer-widget-area footer-1">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <div class="footer-widget-area footer-2">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <div class="footer-widget-area footer-3">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <div class="footer-widget-area footer-4">
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="footer-main">
                <div class="footer-brand">
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
                    <p class="site-description"><?php bloginfo('description'); ?></p>
                </div>

                <?php mileym3dia_social_links('footer-social'); ?>

                <?php if (has_nav_menu('footer')) : ?>
                    <nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Menu', 'mileym3dia'); ?>">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                            'depth'          => 1,
                        ));
                        ?>
                    </nav>
                <?php endif; ?>
            </div>

            <div class="footer-bottom">
                <div class="footer-copyright">
                    <?php
                    $copyright = get_theme_mod('mileym3dia_footer_copyright', __('&copy; ' . date('Y') . ' MILEYM3DIA. All rights reserved.', 'mileym3dia'));
                    echo wp_kses_post($copyright);
                    ?>
                </div>
                
                <?php
                $contact_email = get_theme_mod('mileym3dia_contact_email', 'hello@mileym3dia.com');
                if ($contact_email) :
                ?>
                    <a href="mailto:<?php echo esc_attr($contact_email); ?>" class="footer-email">
                        <?php echo esc_html($contact_email); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
