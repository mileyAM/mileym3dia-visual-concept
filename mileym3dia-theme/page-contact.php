<?php get_header(); ?>

<main class="site-main" id="siteMain">

    <section class="page-title-section">
        <div class="container">
            <span class="page-subtitle">[06] Get In Touch</span>
            <h1 class="page-title">Contact<br><span class="text-red">Us</span></h1>
        </div>
    </section>

    <section class="section-loose">
        <div class="container">
            <div class="grid grid-2" style="gap: var(--spacing-xl); align-items: start;">
                <div>
                    <span class="about-label">Start A Conversation</span>
                    <h2 style="margin-bottom: var(--spacing-md);">Let's Create Something Bold</h2>
                    <p class="about-text" style="margin-bottom: var(--spacing-lg);">
                        Ready to bring your vision to life? We're here to help. 
                        Whether you have a specific project in mind or just want to explore 
                        possibilities, we'd love to hear from you.
                    </p>
                    
                    <div style="margin-bottom: var(--spacing-lg);">
                        <h4 style="font-family: var(--font-mono); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--spacing-sm); opacity: 0.6;">Email</h4>
                        <a href="mailto:hello@mileym3dia.com" class="cta-email" style="font-size: 1.5rem;">hello@mileym3dia.com</a>
                    </div>
                    
                    <div style="margin-bottom: var(--spacing-lg);">
                        <h4 style="font-family: var(--font-mono); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--spacing-sm); opacity: 0.6;">Location</h4>
                        <p style="font-size: 1.125rem;">Los Angeles, California</p>
                    </div>
                    
                    <div>
                        <h4 style="font-family: var(--font-mono); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--spacing-sm); opacity: 0.6;">Follow</h4>
                        <div class="cta-social" style="justify-content: flex-start; margin-top: 0;">
                            <a href="#">Instagram</a>
                            <a href="#">Twitter</a>
                            <a href="#">Behance</a>
                            <a href="#">Vimeo</a>
                        </div>
                    </div>
                </div>
                
                <div style="background: var(--color-darker); padding: var(--spacing-xl); border: 1px solid var(--color-gray);">
                    <form action="#" method="post" style="display: flex; flex-direction: column; gap: var(--spacing-md);">
                        <div>
                            <label for="name" style="display: block; font-family: var(--font-mono); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--spacing-xs);">Name</label>
                            <input type="text" id="name" name="name" required style="width: 100%; padding: var(--spacing-sm); background: var(--color-black); border: 1px solid var(--color-gray); color: var(--color-off-white); font-family: var(--font-body); font-size: 1rem;">
                        </div>
                        
                        <div>
                            <label for="email" style="display: block; font-family: var(--font-mono); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--spacing-xs);">Email</label>
                            <input type="email" id="email" name="email" required style="width: 100%; padding: var(--spacing-sm); background: var(--color-black); border: 1px solid var(--color-gray); color: var(--color-off-white); font-family: var(--font-body); font-size: 1rem;">
                        </div>
                        
                        <div>
                            <label for="subject" style="display: block; font-family: var(--font-mono); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--spacing-xs);">Subject</label>
                            <input type="text" id="subject" name="subject" required style="width: 100%; padding: var(--spacing-sm); background: var(--color-black); border: 1px solid var(--color-gray); color: var(--color-off-white); font-family: var(--font-body); font-size: 1rem;">
                        </div>
                        
                        <div>
                            <label for="message" style="display: block; font-family: var(--font-mono); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: var(--spacing-xs);">Message</label>
                            <textarea id="message" name="message" rows="5" required style="width: 100%; padding: var(--spacing-sm); background: var(--color-black); border: 1px solid var(--color-gray); color: var(--color-off-white); font-family: var(--font-body); font-size: 1rem; resize: vertical;"></textarea>
                        </div>
                        
                        <button type="submit" style="padding: var(--spacing-md); background: var(--color-red); border: none; color: var(--color-white); font-family: var(--font-mono); text-transform: uppercase; letter-spacing: 0.2em; cursor: pointer; transition: all var(--transition-fast); font-weight: 700;">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="visual-transition" style="padding: var(--spacing-xl) 0;">
        <div class="transition-pattern"></div>
        <div class="container">
            <h2 class="transition-text" style="font-size: clamp(2rem, 8vw, 5rem);">Ready To Begin?</h2>
        </div>
    </section>

</main>

<?php get_footer(); ?>
