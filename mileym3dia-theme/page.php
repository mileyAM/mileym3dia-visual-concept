<?php get_header(); ?>

<main class="site-main" id="siteMain">

    <?php while (have_posts()) : the_post(); ?>
    
    <section class="page-title-section">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
    </section>
    
    <section class="section-loose">
        <div class="container container-narrow singular-content">
            <?php the_content(); ?>
        </div>
    </section>
    
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
