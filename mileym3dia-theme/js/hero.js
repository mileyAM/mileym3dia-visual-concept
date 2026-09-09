/**
 * MILEYM3DIA Hero Slider
 * Lightweight vanilla JS hero slider with accessibility support
 */

(function() {
    'use strict';

    // Check if reduced motion is preferred
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    class HeroSlider {
        constructor(container) {
            this.container = container;
            if (!this.container) return;

            this.slides = this.container.querySelectorAll('.hero-slide');
            this.indicators = this.container.querySelectorAll('.hero-indicator');
            this.progressBars = this.container.querySelectorAll('.hero-progress');
            this.prevBtn = this.container.querySelector('.hero-prev');
            this.nextBtn = this.container.querySelector('.hero-next');
            
            this.currentSlide = 0;
            this.totalSlides = this.slides.length;
            this.isPlaying = true;
            this.autoplaySpeed = 6000;
            this.autoplayTimer = null;
            this.touchStartX = 0;
            this.touchEndX = 0;

            if (this.totalSlides <= 1) {
                if (this.slides[0]) {
                    this.slides[0].classList.add('active');
                }
                return;
            }

            this.init();
        }

        init() {
            // Set initial slide
            this.goToSlide(0);

            // Bind events
            this.bindEvents();

            // Start autoplay
            if (!prefersReducedMotion) {
                this.startAutoplay();
            }
        }

        bindEvents() {
            // Navigation buttons
            if (this.prevBtn) {
                this.prevBtn.addEventListener('click', () => this.prev());
            }
            if (this.nextBtn) {
                this.nextBtn.addEventListener('click', () => this.next());
            }

            // Indicators
            this.indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => this.goToSlide(index));
            });

            // Keyboard navigation
            this.container.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    this.prev();
                } else if (e.key === 'ArrowRight') {
                    this.next();
                } else if (e.key === ' ') {
                    e.preventDefault();
                    this.toggleAutoplay();
                }
            });

            // Pause on hover
            this.container.addEventListener('mouseenter', () => this.pauseAutoplay());
            this.container.addEventListener('mouseleave', () => {
                if (!prefersReducedMotion) {
                    this.startAutoplay();
                }
            });

            // Touch events for swipe
            this.container.addEventListener('touchstart', (e) => {
                this.touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            this.container.addEventListener('touchend', (e) => {
                this.touchEndX = e.changedTouches[0].screenX;
                this.handleSwipe();
            }, { passive: true });

            // Visibility change - pause when tab is hidden
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    this.pauseAutoplay();
                } else if (!prefersReducedMotion) {
                    this.startAutoplay();
                }
            });
        }

        handleSwipe() {
            const threshold = 50;
            const diff = this.touchStartX - this.touchEndX;

            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    this.next();
                } else {
                    this.prev();
                }
            }
        }

        goToSlide(index) {
            if (index < 0 || index >= this.totalSlides) return;

            // Remove active class from current
            if (this.slides[this.currentSlide]) {
                this.slides[this.currentSlide].classList.remove('active');
                this.slides[this.currentSlide].setAttribute('aria-hidden', 'true');
            }

            // Update indicators
            this.indicators.forEach(indicator => {
                indicator.classList.remove('active');
                indicator.setAttribute('aria-current', 'false');
            });

            this.currentSlide = index;

            // Add active class to new slide
            if (this.slides[this.currentSlide]) {
                this.slides[this.currentSlide].classList.add('active');
                this.slides[this.currentSlide].setAttribute('aria-hidden', 'false');
            }

            // Update indicators
            if (this.indicators[this.currentSlide]) {
                this.indicators[this.currentSlide].classList.add('active');
                this.indicators[this.currentSlide].setAttribute('aria-current', 'true');
            }

            // Reset progress bars animation
            this.progressBars.forEach(bar => {
                bar.style.animation = 'none';
                bar.offsetHeight; // Trigger reflow
                bar.style.animation = null;
            });

            // Announce slide change for screen readers
            this.announceSlideChange();
        }

        next() {
            const nextIndex = (this.currentSlide + 1) % this.totalSlides;
            this.goToSlide(nextIndex);
        }

        prev() {
            const prevIndex = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            this.goToSlide(prevIndex);
        }

        startAutoplay() {
            if (this.autoplayTimer) {
                clearInterval(this.autoplayTimer);
            }
            this.isPlaying = true;
            this.autoplayTimer = setInterval(() => this.next(), this.autoplaySpeed);
            
            // Update play/pause button state
            const playBtn = this.container.querySelector('.hero-play-pause');
            if (playBtn) {
                playBtn.setAttribute('aria-label', 'Pause slideshow');
                playBtn.classList.add('playing');
            }
        }

        pauseAutoplay() {
            if (this.autoplayTimer) {
                clearInterval(this.autoplayTimer);
                this.autoplayTimer = null;
            }
            this.isPlaying = false;

            // Update play/pause button state
            const playBtn = this.container.querySelector('.hero-play-pause');
            if (playBtn) {
                playBtn.setAttribute('aria-label', 'Play slideshow');
                playBtn.classList.remove('playing');
            }
        }

        toggleAutoplay() {
            if (this.isPlaying) {
                this.pauseAutoplay();
            } else {
                this.startAutoplay();
            }
        }

        announceSlideChange() {
            const announcer = this.container.querySelector('.hero-live-region');
            if (announcer) {
                const slideNumber = this.currentSlide + 1;
                announcer.textContent = `Slide ${slideNumber} of ${this.totalSlides}`;
            }
        }

        destroy() {
            this.pauseAutoplay();
            // Remove event listeners would go here in a more complete implementation
        }
    }

    // Initialize all hero sliders on page load
    function initHeroSliders() {
        const containers = document.querySelectorAll('.hero-slider');
        containers.forEach(container => {
            new HeroSlider(container);
        });
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeroSliders);
    } else {
        initHeroSliders();
    }

    // Expose to global scope for external use
    window.Mileym3diaHeroSlider = HeroSlider;
})();
