<?php
/**
 * Single Project Template
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-project'); ?>>
            <header class="project-header">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="project-featured-image">
                        <?php the_post_thumbnail('mileym3dia-hero'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="project-meta">
                    <?php
                    $categories = get_the_terms(get_the_ID(), 'project_category');
                    if ($categories && !is_wp_error($categories)) :
                    ?>
                        <div class="project-categories">
                            <?php foreach ($categories as $category) : ?>
                                <span class="project-category"><?php echo esc_html($category->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php
                    $meta = mileym3dia_get_project_meta();
                    if ($meta['year']) :
                    ?>
                        <span class="project-year"><?php echo esc_html($meta['year']); ?></span>
                    <?php endif; ?>
                    
                    <?php if ($meta['client']) : ?>
                        <span class="project-client"><?php esc_html_e('Client:', 'mileym3dia'); ?> <?php echo esc_html($meta['client']); ?></span>
                    <?php endif; ?>
                </div>
                
                <h1 class="project-title"><?php the_title(); ?></h1>
            </header>
            
            <div class="project-content">
                <?php the_content(); ?>
            </div>
            
            <?php
            // Project gallery if exists
            $gallery = get_post_meta(get_the_ID(), '_project_gallery', true);
            if ($gallery) :
            ?>
                <section class="project-gallery">
                    <h2><?php esc_html_e('Gallery', 'mileym3dia'); ?></h2>
                    <div class="gallery-grid">
                        <?php foreach ($gallery as $image_id) : ?>
                            <?php echo wp_get_attachment_image($image_id, 'mileym3dia-large'); ?>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
            
            <?php if ($meta['url']) : ?>
                <div class="project-link">
                    <a href="<?php echo esc_url($meta['url']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
                        <?php esc_html_e('View Project', 'mileym3dia'); ?>
                        <?php mileym3dia_icon('external'); ?>
                    </a>
                </div>
            <?php endif; ?>
            
            <nav class="project-navigation">
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>
                <?php if ($prev_post) : ?>
                    <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" class="project-nav-prev">
                        <?php mileym3dia_icon('arrow-left'); ?>
                        <span><?php echo esc_html(get_the_title($prev_post)); ?></span>
                    </a>
                <?php endif; ?>
                
                <a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>" class="project-nav-all">
                    <?php esc_html_e('All Projects', 'mileym3dia'); ?>
                </a>
                
                <?php if ($next_post) : ?>
                    <a href="<?php echo esc_url(get_permalink($next_post)); ?>" class="project-nav-next">
                        <span><?php echo esc_html(get_the_title($next_post)); ?></span>
                        <?php mileym3dia_icon('arrow-right'); ?>
                    </a>
                <?php endif; ?>
            </nav>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();
