<?php
/**
 * Single Post Template
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
        <?php while (have_posts()) : the_post(); ?>
            <header class="entry-header">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail('mileym3dia-large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-meta-top">
                    <?php
                    $categories = get_the_category();
                    if ($categories) {
                        echo '<span class="post-categories">';
                        foreach ($categories as $category) {
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                        }
                        echo '</span>';
                    }
                    ?>
                </div>
                
                <h1 class="entry-title"><?php the_title(); ?></h1>
                
                <div class="entry-meta">
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                    <span class="post-author"><?php echo __('By', 'mileym3dia') . ' ' . get_the_author(); ?></span>
                </div>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            
            <footer class="entry-footer">
                <?php
                $tags = get_the_tags();
                if ($tags) {
                    echo '<div class="post-tags">';
                    foreach ($tags as $tag) {
                        echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">#' . esc_html($tag->name) . '</a>';
                    }
                    echo '</div>';
                }
                ?>
            </footer>
            
            <?php
            // Related posts
            $related_args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post__not_in'   => array(get_the_ID()),
                'category__in'   => wp_list_pluck(get_the_category(), 'term_id'),
            );
            $related_query = new WP_Query($related_args);
            
            if ($related_query->have_posts()) :
            ?>
                <section class="related-posts">
                    <h3><?php esc_html_e('Related Posts', 'mileym3dia'); ?></h3>
                    <div class="related-posts-grid">
                        <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                            <?php mileym3dia_blog_card(get_the_ID()); ?>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php
            endif;
            wp_reset_postdata();
            ?>
            
            <?php if (comments_open() || get_comments_number()) : ?>
                <div class="comments-area">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>
            
        <?php endwhile; ?>
    </article>
</main>

<?php
get_footer();
