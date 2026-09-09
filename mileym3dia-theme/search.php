<?php
/**
 * Search Results Template
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <header class="search-header">
        <h1 class="search-title">
            <?php printf(__('Search Results for: %s', 'mileym3dia'), '<span>' . get_search_query() . '</span>'); ?>
        </h1>
    </header>
    
    <div class="search-results">
        <?php if (have_posts()) : ?>
            <div class="search-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <?php mileym3dia_blog_card(get_the_ID()); ?>
                <?php endwhile; ?>
            </div>
            
            <?php mileym3dia_pagination(); ?>
        <?php else : ?>
            <div class="no-results">
                <p><?php esc_html_e('Nothing found. Try a different search term.', 'mileym3dia'); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
