<?php
/**
 * 404 Error Template
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <div class="error-404">
        <div class="error-content">
            <span class="error-number">404</span>
            <h1 class="error-title"><?php esc_html_e('Page Not Found', 'mileym3dia'); ?></h1>
            <p class="error-description"><?php esc_html_e("The page you're looking for doesn't exist or has been moved.", 'mileym3dia'); ?></p>
            
            <div class="error-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary">
                    <?php esc_html_e('Back to Home', 'mileym3dia'); ?>
                </a>
                <button onclick="history.back()" class="btn btn--secondary">
                    <?php esc_html_e('Go Back', 'mileym3dia'); ?>
                </button>
            </div>
            
            <div class="error-search">
                <p><?php esc_html_e('Or try searching:', 'mileym3dia'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
