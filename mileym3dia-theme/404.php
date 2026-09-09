<?php get_header(); ?>

<main class="site-main" id="siteMain">

    <section class="hero" style="min-height: 80vh;">
        <div class="hero-grid"></div>
        
        <div class="container hero-inner text-center">
            <h1 class="hero-title" style="font-size: clamp(4rem, 20vw, 15rem); color: var(--color-red);">
                404
            </h1>
            <p class="hero-subtitle" style="margin: 0 auto;">
                Page Not Found<br>
                The content you're looking for doesn't exist or has been moved.
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="cta-email" style="margin-top: var(--spacing-md); display: inline-block;">Return Home →</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
