<?php get_header(); ?>

<main class="site-main" id="siteMain">

    <section class="page-title-section">
        <div class="container">
            <span class="page-subtitle">[03] Selected Work</span>
            <h1 class="page-title">Portfolio &<br><span class="text-purple">Projects</span></h1>
        </div>
    </section>

    <section class="work-section section-loose">
        <div class="container">
            <div class="work-grid">
                <?php
                $portfolio_args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 12,
                    'post_status'    => 'publish',
                );
                
                $portfolio_query = new WP_Query($portfolio_args);
                
                if ($portfolio_query->have_posts()) :
                    $counter = 1;
                    while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                ?>
                    <article class="work-item">
                        <span class="work-number"><?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?></span>
                        <a href="<?php the_permalink(); ?>">
                            <div class="work-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('mileym3dia-medium'); ?>
                                <?php else : ?>
                                    <div style="width:100%;height:100%;background:linear-gradient(135deg,#1a1a1a 0%,#2a2a2a 100%);display:flex;align-items:center;justify-content:center;">
                                        <span class="text-micro">PROJECT COMING SOON</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="work-overlay">
                                <h3 class="work-title"><?php the_title(); ?></h3>
                                <span class="work-category">Creative Project</span>
                            </div>
                        </a>
                    </article>
                <?php
                        $counter++;
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <!-- Placeholder portfolio items -->
                    <?php for ($i = 1; $i <= 6; $i++) : ?>
                    <article class="work-item">
                        <span class="work-number"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></span>
                        <a href="#">
                            <div class="work-image">
                                <div style="width:100%;height:100%;background:linear-gradient(135deg,#1a1a1a 0%,#2a2a2a 100%);display:flex;align-items:center;justify-content:center;">
                                    <span class="text-micro">PROJECT COMING SOON</span>
                                </div>
                            </div>
                            <div class="work-overlay">
                                <h3 class="work-title">Untitled Project <?php echo $i; ?></h3>
                                <span class="work-category">Creative Work</span>
                            </div>
                        </a>
                    </article>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="section-loose" style="background: var(--color-dark); border-top: 1px solid var(--color-gray);">
        <div class="container text-center">
            <h2 style="margin-bottom: var(--spacing-md);">Have A Project In Mind?</h2>
            <p class="about-text" style="max-width: 600px; margin: 0 auto var(--spacing-lg);">
                We're always looking for exciting collaborations. Let's discuss how we can 
                bring your vision to life.
            </p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cta-email" style="font-size: 1.25rem;">Start A Conversation →</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
