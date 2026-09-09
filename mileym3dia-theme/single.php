<?php get_header(); ?>

<main class="site-main" id="siteMain">

    <?php while (have_posts()) : the_post(); ?>
    
    <article class="singular-post">
        <header class="singular-header">
            <div class="container">
                <span class="singular-meta"><?php echo get_the_date(); ?> · <?php echo get_the_category_list(', '); ?></span>
                <h1 class="singular-title"><?php the_title(); ?></h1>
            </div>
        </header>
        
        <?php if (has_post_thumbnail()) : ?>
        <div class="singular-featured-image" style="width: 100%; height: 60vh; overflow: hidden;">
            <?php the_post_thumbnail('mileym3dia-hero', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
        </div>
        <?php endif; ?>
        
        <div class="singular-content container container-narrow">
            <?php the_content(); ?>
        </div>
        
        <footer class="container container-narrow" style="padding: var(--spacing-xl) var(--spacing-md); border-top: 1px solid var(--color-gray); margin-top: var(--spacing-xl);">
            <div class="flex-between" style="flex-wrap: wrap; gap: var(--spacing-md);">
                <div>
                    <span class="text-micro">Share This</span>
                    <div class="cta-social" style="justify-content: flex-start; margin-top: var(--spacing-sm);">
                        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>">Twitter</a>
                        <a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>">LinkedIn</a>
                    </div>
                </div>
                <div>
                    <?php 
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    <div style="display: flex; gap: var(--spacing-md);">
                        <?php if ($prev_post) : ?>
                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="text-small">← Previous</a>
                        <?php endif; ?>
                        <?php if ($next_post) : ?>
                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="text-small">Next →</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </footer>
    </article>
    
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
