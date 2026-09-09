    <footer class="site-footer" id="siteFooter">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3 class="footer-logo">MILEYM3DIA</h3>
                    <p class="footer-description">
                        A creative media collective operating at the intersection of 
                        underground culture, digital innovation, and visual storytelling.
                    </p>
                </div>
                
                <div class="footer-column">
                    <h4 class="footer-title">Navigate</h4>
                    <nav class="footer-links">
                        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                        <a href="<?php echo esc_url(home_url('/about/')); ?>">About</a>
                        <a href="<?php echo esc_url(home_url('/services/')); ?>">Services</a>
                        <a href="<?php echo esc_url(home_url('/portfolio/')); ?>">Portfolio</a>
                        <a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a>
                    </nav>
                </div>
                
                <div class="footer-column">
                    <h4 class="footer-title">Connect</h4>
                    <nav class="footer-links">
                        <a href="#">Instagram</a>
                        <a href="#">Twitter</a>
                        <a href="#">Behance</a>
                        <a href="#">Vimeo</a>
                        <a href="#">LinkedIn</a>
                    </nav>
                </div>
                
                <div class="footer-column">
                    <h4 class="footer-title">Legal</h4>
                    <nav class="footer-links">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="mailto:hello@mileym3dia.com">hello@mileym3dia.com</a>
                    </nav>
                </div>
            </div>
            
            <div class="footer-bottom">
                <span>© <?php echo date('Y'); ?> MILEYM3DIA. All Rights Reserved.</span>
                <span>Designed & Built in Los Angeles</span>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
