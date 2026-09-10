<?php get_header(); ?>

<main class="site-main" id="siteMain">

    <!-- HERO SECTION -->
    <section class="hero" id="hero">
        <div class="hero-grid"></div>
        <div class="hero-mark"></div>
        
        <div class="container hero-inner">
            <h1 class="hero-title">
                MILEYM3DIA<br>
                <span class="text-red">CREATIVE</span><br>
                MEDIA
            </h1>
            
            <p class="hero-subtitle">
                CREATE. CAPTURE. ELEVATE.<br>
                Visual Design · Music · Digital Art · Branding
            </p>
        </div>
        
        <div class="hero-metadata">
            EST. 2024 — LOS ANGELES, CA<br>
            LAT: 34.0522° N / LNG: 118.2437° W
        </div>
    </section>

    <!-- BRAND STATEMENT -->
    <section class="brand-statement section-loose">
        <div class="container">
            <p class="statement-text">
                MILEYM3DIA operates at the intersection of <strong>underground creative culture</strong>, 
                <strong>digital innovation</strong>, and <strong>visual storytelling</strong>. 
                We craft experiences that merge music, design, and technology into something 
                <span class="text-red">unapologetically bold</span>.
            </p>
        </div>
    </section>

    <!-- WORK SHOWCASE -->
    <section class="work-section section-loose">
        <div class="container">
            <div class="section-header">
                <span class="section-label">[01] Selected Work</span>
                <a href="<?php echo esc_url(home_url('/portfolio/')); ?>" class="text-small">View All →</a>
            </div>
            
            <div class="work-grid">
                <?php
                $work_args = array(
                    'post_type'      => 'project',
                    'posts_per_page' => 4,
                    'post_status'    => 'publish',
                );
                
                $work_query = new WP_Query($work_args);
                
                if ($work_query->have_posts()) :
                    $counter = 1;
                    while ($work_query->have_posts()) : $work_query->the_post();
                ?>
                    <article class="work-item">
                        <span class="work-number"><?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?></span>
                        <a href="<?php the_permalink(); ?>">
                            <div class="work-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('mileym3dia-medium'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio-<?php echo (($counter - 1) % 4 + 1); ?>.jpg" alt="<?php the_title_attribute(); ?>" style="width:100%;height:100%;object-fit:cover;" />
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
                    <!-- Placeholder work items with actual images -->
                    <article class="work-item">
                        <span class="work-number">01</span>
                        <a href="#">
                            <div class="work-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio-1.jpg" alt="Project placeholder" style="width:100%;height:100%;object-fit:cover;" />
                            </div>
                            <div class="work-overlay">
                                <h3 class="work-title">Untitled Project I</h3>
                                <span class="work-category">Visual Design</span>
                            </div>
                        </a>
                    </article>
                    
                    <article class="work-item">
                        <span class="work-number">02</span>
                        <a href="#">
                            <div class="work-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio-2.jpg" alt="Project placeholder" style="width:100%;height:100%;object-fit:cover;" />
                            </div>
                            <div class="work-overlay">
                                <h3 class="work-title">Untitled Project II</h3>
                                <span class="work-category">Music Production</span>
                            </div>
                        </a>
                    </article>
                    
                    <article class="work-item">
                        <span class="work-number">03</span>
                        <a href="#">
                            <div class="work-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio-3.jpg" alt="Project placeholder" style="width:100%;height:100%;object-fit:cover;" />
                            </div>
                            <div class="work-overlay">
                                <h3 class="work-title">Untitled Project III</h3>
                                <span class="work-category">Digital Art</span>
                            </div>
                        </a>
                    </article>
                    
                    <article class="work-item">
                        <span class="work-number">04</span>
                        <a href="#">
                            <div class="work-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio-4.jpg" alt="Project placeholder" style="width:100%;height:100%;object-fit:cover;" />
                            </div>
                            <div class="work-overlay">
                                <h3 class="work-title">Untitled Project IV</h3>
                                <span class="work-category">Branding</span>
                            </div>
                        </a>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CAPABILITIES -->
    <section class="capabilities-section section-loose">
        <div class="container">
            <div class="section-header">
                <span class="section-label">[02] Capabilities</span>
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

    <!-- ABOUT SECTION -->
    <section class="about-section section-loose">
        <div class="container">
            <div class="about-grid">
                <div class="about-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('mileym3dia-large'); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-image.jpg" alt="MILEYM3DIA brand image" style="width:100%;height:100%;object-fit:cover;" />
                    <?php endif; ?>
                </div>
                
                <div class="about-content">
                    <span class="about-label">[03] About MILEYM3DIA</span>
                    <h2>Beyond The Standard</h2>
                    <p class="about-text">
                        We're not a typical agency. We're creators, producers, and innovators 
                        working at the edge of what's possible in digital media. Our approach 
                        combines raw creative instinct with technical precision.
                    </p>
                    <p class="about-text">
                        From underground music scenes to high-end brand campaigns, we bring 
                        an authentic voice that resonates with audiences who demand more than 
                        generic content.
                    </p>
                    <div class="about-signature">
                        MILEYM3DIA — Creative Media Collective
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VISUAL TRANSITION -->
    <section class="visual-transition">
        <div class="transition-pattern" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/services-bg.jpg');"></div>
        <div class="container">
            <h2 class="transition-text">
                Create Without<br>Limits
            </h2>
        </div>
    </section>

    <!-- SERVICES -->
    <section class="services-section section-loose">
        <div class="container">
            <div class="section-header">
                <span class="section-label">[04] Disciplines</span>
            </div>
            
            <div class="services-grid">
                <article class="service-card">
                    <div class="service-icon">◈</div>
                    <h3 class="service-title">Art Direction</h3>
                    <p class="service-description">
                        Complete visual identity development from concept to execution. 
                        We shape how brands look, feel, and communicate.
                    </p>
                </article>
                
                <article class="service-card">
                    <div class="service-icon">◇</div>
                    <h3 class="service-title">Music & Audio</h3>
                    <p class="service-description">
                        Original compositions, sound design, and audio production 
                        for brands, films, and digital experiences.
                    </p>
                </article>
                
                <article class="service-card">
                    <div class="service-icon">◆</div>
                    <h3 class="service-title">Digital Content</h3>
                    <p class="service-description">
                        Social-first content that captures attention and drives 
                        engagement across all platforms.
                    </p>
                </article>
                
                <article class="service-card">
                    <div class="service-icon">▽</div>
                    <h3 class="service-title">Motion Design</h3>
                    <p class="service-description">
                        Animated graphics, title sequences, and motion content 
                        that brings static visuals to life.
                    </p>
                </article>
                
                <article class="service-card">
                    <div class="service-icon">◁</div>
                    <h3 class="service-title">Photography</h3>
                    <p class="service-description">
                        Editorial, product, and lifestyle photography with a 
                        distinctive visual perspective.
                    </p>
                </article>
                
                <article class="service-card">
                    <div class="service-icon">△</div>
                    <h3 class="service-title">Web & Interactive</h3>
                    <p class="service-description">
                        Immersive digital experiences that push the boundaries 
                        of what's possible on the web.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <!-- RESOURCES -->
    <section class="resources-section section-loose" style="background-image: linear-gradient(rgba(10,10,10,0.85), rgba(10,10,10,0.95)), url('<?php echo get_template_directory_uri(); ?>/assets/images/resources-visual.jpg'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="section-header">
                <span class="section-label">[05] Resources</span>
                <a href="<?php echo esc_url(home_url('/resources/')); ?>" class="text-small">Explore All →</a>
            </div>
            
            <div class="resource-list">
                <a href="#" class="resource-item">
                    <div class="resource-info">
                        <div class="resource-icon">▤</div>
                        <div>
                            <h4 class="resource-title">Creative Toolkits</h4>
                            <span class="resource-meta">Coming Soon</span>
                        </div>
                    </div>
                    <span class="resource-arrow">→</span>
                </a>
                
                <a href="#" class="resource-item">
                    <div class="resource-info">
                        <div class="resource-icon">▥</div>
                        <div>
                            <h4 class="resource-title">Design Guides</h4>
                            <span class="resource-meta">Coming Soon</span>
                        </div>
                    </div>
                    <span class="resource-arrow">→</span>
                </a>
                
                <a href="#" class="resource-item">
                    <div class="resource-info">
                        <div class="resource-icon">▦</div>
                        <div>
                            <h4 class="resource-title">Audio Assets</h4>
                            <span class="resource-meta">Coming Soon</span>
                        </div>
                    </div>
                    <span class="resource-arrow">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- BLOG -->
    <section class="blog-section section-loose">
        <div class="container">
            <div class="section-header">
                <span class="section-label">[06] Latest</span>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="text-small">All Posts →</a>
            </div>
            
            <div class="blog-grid">
                <?php
                $blog_args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                );
                
                $blog_query = new WP_Query($blog_args);
                
                if ($blog_query->have_posts()) :
                    $blog_counter = 1;
                    while ($blog_query->have_posts()) : $blog_query->the_post();
                ?>
                    <article class="blog-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('mileym3dia-medium'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-<?php echo $blog_counter; ?>.jpg" alt="<?php the_title_attribute(); ?>" style="width:100%;height:100%;object-fit:cover;" />
                                <?php endif; ?>
                            </div>
                            <div class="blog-content">
                                <span class="blog-date"><?php echo get_the_date(); ?></span>
                                <h3 class="blog-title"><?php the_title(); ?></h3>
                                <p class="blog-excerpt"><?php echo mileym3dia_custom_excerpt(15); ?></p>
                            </div>
                        </a>
                    </article>
                <?php
                        $blog_counter++;
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <article class="blog-card">
                        <a href="#">
                            <div class="blog-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-1.jpg" alt="Blog placeholder" style="width:100%;height:100%;object-fit:cover;" />
                            </div>
                            <div class="blog-content">
                                <span class="blog-date">COMING SOON</span>
                                <h3 class="blog-title">First Post Coming</h3>
                                <p class="blog-excerpt">Stay tuned for our latest thoughts and updates.</p>
                            </div>
                        </a>
                    </article>
                    
                    <article class="blog-card">
                        <a href="#">
                            <div class="blog-image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-2.jpg" alt="Blog placeholder" style="width:100%;height:100%;object-fit:cover;" />
                            </div>
                            <div class="blog-content">
                                <span class="blog-date">COMING SOON</span>
                                <h3 class="blog-title">Second Post Coming</h3>
                                <p class="blog-excerpt">More creative insights on the way.</p>
                            </div>
                        </a>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CONTACT CTA -->
    <section class="contact-cta section-loose">
        <div class="container cta-content">
            <span class="cta-label">[07] Get In Touch</span>
            <h2 class="cta-title">Let's Create Together</h2>
            <a href="mailto:hello@mileym3dia.com" class="cta-email">hello@mileym3dia.com</a>
            
            <div class="cta-social">
                <a href="#">Instagram</a>
                <a href="#">Twitter</a>
                <a href="#">Behance</a>
                <a href="#">Vimeo</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
