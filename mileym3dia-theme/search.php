<?php get_header(); ?>

<main class="site-main" id="siteMain">

    <section class="page-title-section">
        <div class="container">
            <span class="page-subtitle">Search Results</span>
            <h1 class="page-title">Searching:<br><span class="text-red">"<?php echo get_search_query(); ?>"</span></h1>
        </div>
    </section>

    <section class="blog-section section-loose">
        <div class="container">
            <?php if (have_posts()) : ?>
            <div class="blog-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="blog-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('mileym3dia-medium'); ?>
                                <?php else : ?>
                                    <div style="width:100%;height:100%;background:linear-gradient(135deg,#2a2a2a 0%,#3a3a3a 100%);"></div>
                                <?php endif; ?>
                            </div>
                            <div class="blog-content">
                                <span class="blog-date"><?php echo get_the_date(); ?></span>
                                <h3 class="blog-title"><?php the_title(); ?></h3>
                                <p class="blog-excerpt"><?php echo mileym3dia_custom_excerpt(15); ?></p>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php if (function_exists('the_posts_pagination')) : ?>
            <div class="pagination" style="margin-top: var(--spacing-xl); display: flex; justify-content: center; gap: var(--spacing-sm);">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                ));
                ?>
            </div>
            <?php endif; ?>
            
            <?php else : ?>
            <div class="container-narrow text-center" style="padding: var(--spacing-xl) 0;">
                <h2>No Results Found</h2>
                <p class="about-text">Try searching with different keywords or browse our latest content.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="cta-email" style="margin-top: var(--spacing-md); display: inline-block;">Return Home →</a>
            </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
