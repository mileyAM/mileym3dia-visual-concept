<?php get_header(); ?>

<main class="site-main" id="siteMain">

    <section class="page-title-section">
        <div class="container">
            <span class="page-subtitle">[05] Latest Updates</span>
            <h1 class="page-title">Blog &<br><span class="text-lime">Insights</span></h1>
        </div>
    </section>

    <section class="blog-section section-loose">
        <div class="container">
            <div class="blog-grid">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                <?php endwhile; else : ?>
                    <article class="blog-card">
                        <a href="#">
                            <div class="blog-image">
                                <div style="width:100%;height:100%;background:linear-gradient(135deg,#2a2a2a 0%,#3a3a3a 100%);display:flex;align-items:center;justify-content:center;">
                                    <span class="text-micro">CONTENT COMING SOON</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <span class="blog-date">COMING SOON</span>
                                <h3 class="blog-title">First Post Coming</h3>
                                <p class="blog-excerpt">Stay tuned for our latest thoughts and updates.</p>
                            </div>
                        </a>
                    </article>
                <?php endif; ?>
            </div>
            
            <?php if (function_exists('the_posts_pagination')) : ?>
            <div class="pagination" style="margin-top: var(--spacing-xl); display: flex; justify-content: center; gap: var(--spacing-sm);">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                    'class'     => 'pagination-links',
                ));
                ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
