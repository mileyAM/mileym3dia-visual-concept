<?php
/**
 * Front Page Template Part
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Hero Section -->
<section class="hero-section" aria-label="<?php esc_attr_e('Hero', 'mileym3dia'); ?>">
    <div class="hero-slider">
        <?php
        $eyebrow = get_theme_mod('mileym3dia_hero_eyebrow', __('CREATIVE MEDIA', 'mileym3dia'));
        $headline_1 = get_theme_mod('mileym3dia_hero_headline_1', __('MILEYM3DIA', 'mileym3dia'));
        $headline_2 = get_theme_mod('mileym3dia_hero_headline_2', __('MUSIC. DESIGN. DIGITAL.', 'mileym3dia'));
        $description = get_theme_mod('mileym3dia_hero_description', __('Creating bold visual experiences at the intersection of art, music, and digital culture.', 'mileym3dia'));
        $cta_primary = get_theme_mod('mileym3dia_hero_cta_primary', __('Explore Work', 'mileym3dia'));
        $cta_primary_url = get_theme_mod('mileym3dia_hero_cta_primary_url', '/portfolio/');
        $cta_secondary = get_theme_mod('mileym3dia_hero_cta_secondary', __('Contact Us', 'mileym3dia'));
        $cta_secondary_url = get_theme_mod('mileym3dia_hero_cta_secondary_url', '/contact/');
        ?>
        
        <!-- Slide 1 -->
        <div class="hero-slide active" role="group" aria-roledescription="slide" aria-label="1 of 1">
            <div class="hero-content hero-content--<?php echo esc_attr(get_theme_mod('mileym3dia_hero_alignment', 'left')); ?>">
                <span class="hero-eyebrow"><?php echo esc_html($eyebrow); ?></span>
                <h1 class="hero-headline">
                    <span class="hero-headline-1"><?php echo esc_html($headline_1); ?></span>
                    <span class="hero-headline-2"><?php echo esc_html($headline_2); ?></span>
                </h1>
                <p class="hero-description"><?php echo esc_html($description); ?></p>
                <div class="hero-cta-group">
                    <a href="<?php echo esc_url($cta_primary_url); ?>" class="btn btn--primary btn--large">
                        <?php echo esc_html($cta_primary); ?>
                        <?php mileym3dia_icon('arrow-right'); ?>
                    </a>
                    <a href="<?php echo esc_url($cta_secondary_url); ?>" class="btn btn--secondary btn--large">
                        <?php echo esc_html($cta_secondary); ?>
                    </a>
                </div>
            </div>
            <div class="hero-visuals">
                <div class="hero-grid"></div>
                <div class="hero-mark">M3</div>
            </div>
        </div>
    </div>
    
    <!-- Hero Controls -->
    <div class="hero-controls">
        <button class="hero-prev" aria-label="<?php esc_attr_e('Previous slide', 'mileym3dia'); ?>">
            <?php mileym3dia_icon('arrow-left'); ?>
        </button>
        <div class="hero-indicators">
            <button class="hero-indicator active" aria-label="<?php esc_attr_e('Go to slide 1', 'mileym3dia'); ?>" aria-current="true"></button>
        </div>
        <button class="hero-next" aria-label="<?php esc_attr_e('Next slide', 'mileym3dia'); ?>">
            <?php mileym3dia_icon('arrow-right'); ?>
        </button>
    </div>
    
    <!-- Screen reader announcements -->
    <div class="hero-live-region sr-only" aria-live="polite" aria-atomic="true"></div>
</section>

<?php if (mileym3dia_show_section('brand_statement')) : ?>
<!-- Brand Statement Section -->
<section class="brand-statement-section" aria-labelledby="brand-statement-title">
    <div class="container">
        <div class="brand-statement">
            <h2 id="brand-statement-title" class="brand-statement-title">
                <?php esc_html_e('We create work that challenges expectations and defines culture.', 'mileym3dia'); ?>
            </h2>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (mileym3dia_show_section('selected_work')) : ?>
<!-- Selected Work Section -->
<section class="portfolio-section" aria-labelledby="portfolio-title">
    <div class="container">
        <?php
        mileym3dia_section_heading(array(
            'eyebrow'     => __('Portfolio', 'mileym3dia'),
            'title'       => get_theme_mod('mileym3dia_portfolio_title', __('Selected Work', 'mileym3dia')),
            'number'      => '01',
            'align'       => 'left',
        ));
        ?>
        
        <div class="portfolio-grid">
            <?php
            $portfolio_args = array(
                'post_type'      => 'project',
                'posts_per_page' => get_theme_mod('mileym3dia_portfolio_count', 6),
            );
            $portfolio_query = new WP_Query($portfolio_args);
            
            if ($portfolio_query->have_posts()) :
                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                    mileym3dia_portfolio_item(get_the_ID());
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="no-projects-placeholder">
                    <p><?php esc_html_e('Projects coming soon.', 'mileym3dia'); ?></p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="portfolio-cta">
            <a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>" class="btn btn--primary">
                <?php esc_html_e('View All Projects', 'mileym3dia'); ?>
                <?php mileym3dia_icon('arrow-right'); ?>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (mileym3dia_show_section('capabilities')) : ?>
<!-- Capabilities Section -->
<section class="capabilities-section" aria-labelledby="capabilities-title">
    <div class="container">
        <?php
        mileym3dia_section_heading(array(
            'eyebrow'     => __('What We Do', 'mileym3dia'),
            'title'       => __('Capabilities', 'mileym3dia'),
            'number'      => '02',
            'align'       => 'left',
        ));
        ?>
        
        <div class="capabilities-grid">
            <div class="capability-item capability--design">
                <h3><?php esc_html_e('Visual Design', 'mileym3dia'); ?></h3>
                <p><?php esc_html_e('Brand identity, digital experiences, print design', 'mileym3dia'); ?></p>
            </div>
            <div class="capability-item capability--motion">
                <h3><?php esc_html_e('Motion & Video', 'mileym3dia'); ?></h3>
                <p><?php esc_html_e('Music videos, motion graphics, visual effects', 'mileym3dia'); ?></p>
            </div>
            <div class="capability-item capability--digital">
                <h3><?php esc_html_e('Digital Production', 'mileym3dia'); ?></h3>
                <p><?php esc_html_e('Web development, interactive experiences, AR/VR', 'mileym3dia'); ?></p>
            </div>
            <div class="capability-item capability--strategy">
                <h3><?php esc_html_e('Creative Strategy', 'mileym3dia'); ?></h3>
                <p><?php esc_html_e('Brand positioning, campaign concepts, content strategy', 'mileym3dia'); ?></p>
            </div>
            <div class="capability-item capability--music">
                <h3><?php esc_html_e('Music & Audio', 'mileym3dia'); ?></h3>
                <p><?php esc_html_e('Sound design, original composition, audio production', 'mileym3dia'); ?></p>
            </div>
            <div class="capability-item capability--photography">
                <h3><?php esc_html_e('Photography', 'mileym3dia'); ?></h3>
                <p><?php esc_html_e('Editorial shoots, product photography, retouching', 'mileym3dia'); ?></p>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (mileym3dia_show_section('about_preview')) : ?>
<!-- About Preview Section -->
<section class="about-preview-section" aria-labelledby="about-preview-title">
    <div class="container">
        <div class="about-preview-grid">
            <div class="about-preview-content">
                <?php
                mileym3dia_section_heading(array(
                    'eyebrow'     => __('About', 'mileym3dia'),
                    'title'       => get_theme_mod('mileym3dia_about_title', __('Who We Are', 'mileym3dia')),
                    'number'      => '03',
                    'align'       => 'left',
                ));
                ?>
                <p class="about-preview-text">
                    <?php echo esc_html(get_theme_mod('mileym3dia_about_content', __('MILEYM3DIA is a creative media brand operating at the intersection of visual design, music, and digital culture. We create bold, uncompromising work that pushes boundaries and captures attention.', 'mileym3dia'))); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/about/')); ?>" class="btn btn--primary">
                    <?php esc_html_e('Learn More', 'mileym3dia'); ?>
                    <?php mileym3dia_icon('arrow-right'); ?>
                </a>
            </div>
            <div class="about-preview-image">
                <div class="image-placeholder">
                    <span><?php esc_html_e('About Image', 'mileym3dia'); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (mileym3dia_show_section('services')) : ?>
<!-- Services Section -->
<section class="services-section" aria-labelledby="services-title">
    <div class="container">
        <?php
        mileym3dia_section_heading(array(
            'eyebrow'     => __('Services', 'mileym3dia'),
            'title'       => get_theme_mod('mileym3dia_services_title', __('Creative Disciplines', 'mileym3dia')),
            'description' => get_theme_mod('mileym3dia_services_description', __('End-to-end creative production across multiple disciplines.', 'mileym3dia')),
            'number'      => '04',
            'align'       => 'left',
        ));
        ?>
        
        <div class="services-list">
            <div class="service-item service-item--lime">
                <h3><?php esc_html_e('Art Direction', 'mileym3dia'); ?></h3>
                <p><?php esc_html_e('Visual concept development, creative direction, brand aesthetics', 'mileym3dia'); ?></p>
            </div>
            <div class="service-item service-item--purple">
                <h3><?php esc_html_e('Brand Identity', 'mileym3dia'); ?></h3>
                <p><?php esc_html_e('Logo design, visual systems, brand guidelines', 'mileym3dia'); ?></p>
            </div>
            <div class="service-item service-item--blue">
                <h3><?php esc_html_e('Web & Digital', 'mileym3dia'); ?></h3>
                <p><?php esc_html_e('Website design, UI/UX, digital experiences', 'mileym3dia'); ?></p>
            </div>
            <div class="service-item service-item--red">
                <h3><?php esc_html_e('Content Creation', 'mileym3dia'); ?></h3>
                <p><?php esc_html_e('Video production, photography, social content', 'mileym3dia'); ?></p>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (mileym3dia_show_section('resources')) : ?>
<!-- Resources Preview Section -->
<section class="resources-preview-section" aria-labelledby="resources-title">
    <div class="container">
        <?php
        mileym3dia_section_heading(array(
            'eyebrow'     => __('Resources', 'mileym3dia'),
            'title'       => __('Insights & Tools', 'mileym3dia'),
            'number'      => '05',
            'align'       => 'left',
        ));
        ?>
        
        <div class="resources-grid">
            <div class="resource-item">
                <span class="resource-type"><?php esc_html_e('Guide', 'mileym3dia'); ?></span>
                <h3 class="resource-title"><?php esc_html_e('Creative Process Guide', 'mileym3dia'); ?></h3>
                <a href="<?php echo esc_url(home_url('/resources/')); ?>" class="resource-link">
                    <?php mileym3dia_icon('arrow-right'); ?>
                </a>
            </div>
            <div class="resource-item">
                <span class="resource-type"><?php esc_html_e('Tutorial', 'mileym3dia'); ?></span>
                <h3 class="resource-title"><?php esc_html_e('Design Fundamentals', 'mileym3dia'); ?></h3>
                <a href="<?php echo esc_url(home_url('/resources/')); ?>" class="resource-link">
                    <?php mileym3dia_icon('arrow-right'); ?>
                </a>
            </div>
            <div class="resource-item">
                <span class="resource-type"><?php esc_html_e('Tool', 'mileym3dia'); ?></span>
                <h3 class="resource-title"><?php esc_html_e('Brand Toolkit', 'mileym3dia'); ?></h3>
                <a href="<?php echo esc_url(home_url('/resources/')); ?>" class="resource-link">
                    <?php mileym3dia_icon('arrow-right'); ?>
                </a>
            </div>
        </div>
        
        <div class="resources-cta">
            <a href="<?php echo esc_url(home_url('/resources/')); ?>" class="btn btn--secondary">
                <?php esc_html_e('View All Resources', 'mileym3dia'); ?>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (mileym3dia_show_section('blog')) : ?>
<!-- Blog Preview Section -->
<section class="blog-preview-section" aria-labelledby="blog-title">
    <div class="container">
        <?php
        mileym3dia_section_heading(array(
            'eyebrow'     => __('Blog', 'mileym3dia'),
            'title'       => __('Latest Thoughts', 'mileym3dia'),
            'number'      => '06',
            'align'       => 'left',
        ));
        ?>
        
        <div class="blog-grid">
            <?php
            $blog_args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
            );
            $blog_query = new WP_Query($blog_args);
            
            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
                    mileym3dia_blog_card(get_the_ID());
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <p><?php esc_html_e('Blog posts coming soon.', 'mileym3dia'); ?></p>
            <?php endif; ?>
        </div>
        
        <div class="blog-cta">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn--secondary">
                <?php esc_html_e('View All Posts', 'mileym3dia'); ?>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (mileym3dia_show_section('contact_cta')) : ?>
<!-- Contact CTA Section -->
<section class="contact-cta-section" aria-labelledby="contact-cta-title">
    <div class="container">
        <div class="contact-cta-content">
            <?php
            $contact_email = get_theme_mod('mileym3dia_contact_email', 'hello@mileym3dia.com');
            $contact_cta = get_theme_mod('mileym3dia_contact_cta', __("Let's Create Together", 'mileym3dia'));
            ?>
            <h2 id="contact-cta-title" class="contact-cta-title"><?php echo esc_html($contact_cta); ?></h2>
            <a href="mailto:<?php echo esc_attr($contact_email); ?>" class="contact-email">
                <?php echo esc_html($contact_email); ?>
            </a>
            <div class="contact-cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--large">
                    <?php esc_html_e('Start a Project', 'mileym3dia'); ?>
                    <?php mileym3dia_icon('arrow-right'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
// Homepage widgets
if (is_active_sidebar('homepage-1')) :
?>
    <section class="homepage-widgets">
        <?php dynamic_sidebar('homepage-1'); ?>
    </section>
<?php endif; ?>
