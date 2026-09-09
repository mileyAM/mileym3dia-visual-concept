<?php
/**
 * Archive Template
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <header class="archive-header">
        <?php
        the_archive_title('<h1 class="archive-title">', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
    </header>
    
    <div class="archive-grid">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php mileym3dia_blog_card(get_the_ID()); ?>
            <?php endwhile; ?>
            
            <?php mileym3dia_pagination(); ?>
        <?php else : ?>
            <p><?php esc_html_e('No posts found.', 'mileym3dia'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
