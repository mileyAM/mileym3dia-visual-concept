<?php
/**
 * Content Template Part
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-item'); ?>>
    <header class="entry-header">
        <?php if (has_post_thumbnail()) : ?>
            <div class="entry-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('mileym3dia-medium'); ?>
                </a>
            </div>
        <?php endif; ?>
        
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        
        <div class="entry-meta">
            <span class="entry-date"><?php echo get_the_date(); ?></span>
            <span class="entry-author"><?php echo __('By', 'mileym3dia') . ' ' . get_the_author(); ?></span>
        </div>
    </header>
    
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
    
    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more btn btn--secondary">
            <?php esc_html_e('Read More', 'mileym3dia'); ?>
            <?php mileym3dia_icon('arrow-right'); ?>
        </a>
    </footer>
</article>
