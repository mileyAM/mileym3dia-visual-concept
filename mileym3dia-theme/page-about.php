<?php get_header(); ?>

<main class="site-main" id="siteMain">

    <section class="page-title-section">
        <div class="container">
            <span class="page-subtitle">[01] Who We Are</span>
            <h1 class="page-title">About<br><span class="text-red">MILEYM3DIA</span></h1>
        </div>
    </section>

    <section class="about-section section-loose">
        <div class="container">
            <div class="about-grid">
                <div class="about-content" style="padding-right: 0;">
                    <span class="about-label">Our Story</span>
                    <h2>Born From Creative Rebellion</h2>
                    <p class="about-text">
                        MILEYM3DIA emerged from a simple observation: the most compelling 
                        creative work happens at the edges, not the center. We're a collective 
                        of designers, producers, musicians, and digital artists united by a 
                        shared vision of what media can be.
                    </p>
                    <p class="about-text">
                        We don't believe in playing it safe. Our work is intentionally bold, 
                        visually striking, and culturally relevant. We draw inspiration from 
                        underground music scenes, street culture, high fashion, and cutting-edge 
                        technology.
                    </p>
                </div>
                
                <div class="about-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('mileym3dia-large'); ?>
                    <?php else : ?>
                        <div style="width:100%;height:100%;background:linear-gradient(135deg,#1a1a1a 0%,#2a2a2a 100%);display:flex;align-items:center;justify-content:center;">
                            <span class="text-micro">BRAND IMAGE</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="capabilities-section section-loose">
        <div class="container">
            <div class="section-header">
                <span class="section-label">What We Do</span>
            </div>
            
            <div class="capability-list">
                <div class="capability-item">
                    <span class="capability-name">Visual Design</span>
                    <span class="capability-arrow">→</span>
                </div>
                <div class="capability-item">
                    <span class="capability-name">Music Production</span>
                    <span class="capability-arrow">→</span>
                </div>
                <div class="capability-item">
                    <span class="capability-name">Digital Art</span>
                    <span class="capability-arrow">→</span>
                </div>
                <div class="capability-item">
                    <span class="capability-name">Branding</span>
                    <span class="capability-arrow">→</span>
                </div>
                <div class="capability-item">
                    <span class="capability-name">Video & Motion</span>
                    <span class="capability-arrow">→</span>
                </div>
                <div class="capability-item">
                    <span class="capability-name">Web Experience</span>
                    <span class="capability-arrow">→</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section-loose" style="background: var(--color-dark);">
        <div class="container">
            <div class="grid grid-2" style="gap: var(--spacing-xl); align-items: center;">
                <div>
                    <span class="about-label">Our Philosophy</span>
                    <h2>Create Without Compromise</h2>
                    <p class="about-text">
                        Every project is an opportunity to push boundaries. We approach each 
                        collaboration with fresh eyes and unlimited creative potential.
                    </p>
                    <p class="about-text">
                        Our process is collaborative, iterative, and always focused on 
                        delivering work that stands out in an oversaturated media landscape.
                    </p>
                </div>
                <div style="background: var(--color-darker); padding: var(--spacing-lg); border-left: 2px solid var(--color-red);">
                    <blockquote style="border: none; padding: 0; margin: 0; font-size: 1.5rem; line-height: 1.6;">
                        "We don't follow trends. We create them. Our work speaks to those who 
                        understand that great media isn't just seen—it's felt."
                    </blockquote>
                    <p class="text-small mt-md" style="opacity: 0.6;">— MILEYM3DIA Collective</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-cta section-loose">
        <div class="container cta-content">
            <span class="cta-label">Work With Us</span>
            <h2 class="cta-title">Let's Create Together</h2>
            <a href="mailto:hello@mileym3dia.com" class="cta-email">hello@mileym3dia.com</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
