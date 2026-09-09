/**
 * MILEYM3DIA Theme - Main JavaScript
 * Handles navigation, animations, and interactive elements
 */

(function() {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        
        // ========================================
        // SCROLL PROGRESS BAR
        // ========================================
        const scrollProgress = document.getElementById('scrollProgress');
        if (scrollProgress) {
            window.addEventListener('scroll', function() {
                const scrollTop = window.scrollY;
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const scrollPercent = (scrollTop / docHeight) * 100;
                scrollProgress.style.width = scrollPercent + '%';
            });
        }

        // ========================================
        // MOBILE MENU TOGGLE
        // ========================================
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenuClose = document.getElementById('mobileMenuClose');
        const navMobile = document.getElementById('navMobile');
        const body = document.body;
        
        function openMobileMenu() {
            if (navMobile) {
                navMobile.classList.add('active');
                navMobile.setAttribute('aria-hidden', 'false');
            }
            body.style.overflow = 'hidden';
            body.setAttribute('data-menu-open', 'true');
            if (mobileMenuToggle) {
                mobileMenuToggle.setAttribute('aria-expanded', 'true');
            }
        }
        
        function closeMobileMenu() {
            if (navMobile) {
                navMobile.classList.remove('active');
                navMobile.setAttribute('aria-hidden', 'true');
            }
            body.style.overflow = '';
            body.removeAttribute('data-menu-open');
            if (mobileMenuToggle) {
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
            }
        }
        
        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', openMobileMenu);
            mobileMenuToggle.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    openMobileMenu();
                }
            });
        }
        
        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', closeMobileMenu);
        }
        
        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && navMobile && navMobile.classList.contains('active')) {
                closeMobileMenu();
            }
        });

        // ========================================
        // HEADER SCROLL EFFECT
        // ========================================
        const siteHeader = document.getElementById('siteHeader');
        if (siteHeader) {
            let lastScroll = 0;
            window.addEventListener('scroll', function() {
                const currentScroll = window.scrollY;
                
                if (currentScroll > 100) {
                    siteHeader.classList.add('scrolled');
                } else {
                    siteHeader.classList.remove('scrolled');
                }
                
                lastScroll = currentScroll;
            });
        }

        // ========================================
        // INTERSECTION OBSERVER FOR ANIMATIONS
        // ========================================
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        
        if (!prefersReducedMotion) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            const animateElements = document.querySelectorAll('.portfolio-item, .service-item, .blog-card, .capability-item, .resource-item, .section-heading');
            animateElements.forEach(function(el) {
                el.classList.add('animate-on-scroll');
                observer.observe(el);
            });
        }

        // ========================================
        // SMOOTH SCROLL FOR ANCHOR LINKS
        // ========================================
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: prefersReducedMotion ? 'auto' : 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // ========================================
        // CAPABILITY ITEMS HOVER EFFECT
        // ========================================
        const capabilityItems = document.querySelectorAll('.capability-item');
        capabilityItems.forEach(function(item) {
            item.addEventListener('mouseenter', function() {
                capabilityItems.forEach(function(otherItem) {
                    if (otherItem !== item) {
                        otherItem.style.opacity = '0.3';
                    }
                });
            });
            
            item.addEventListener('mouseleave', function() {
                capabilityItems.forEach(function(otherItem) {
                    otherItem.style.opacity = '1';
                });
            });
        });

        // ========================================
        // PARALLAX EFFECT FOR HERO ELEMENTS
        // ========================================
        const heroGrid = document.querySelector('.hero-grid');
        const heroMark = document.querySelector('.hero-mark');
        
        if ((heroGrid || heroMark) && !prefersReducedMotion) {
            window.addEventListener('scroll', function() {
                const scrolled = window.scrollY;
                const heroHeight = window.innerHeight;
                
                if (scrolled < heroHeight) {
                    if (heroGrid) {
                        heroGrid.style.transform = 'translateY(' + (scrolled * 0.3) + 'px)';
                    }
                    if (heroMark) {
                        heroMark.style.transform = 'translateY(' + (scrolled * 0.2) + 'px)';
                    }
                }
            });
        }

        // ========================================
        // ADD LOADED CLASS TO BODY
        // ========================================
        document.body.classList.add('loaded');

        // ========================================
        // STICKY HEADER TOGGLE (if enabled)
        // ========================================
        const stickyHeader = document.querySelector('.site-header.sticky');
        if (stickyHeader) {
            let lastScrollTop = 0;
            window.addEventListener('scroll', function() {
                const scrollTop = window.scrollY;
                
                if (scrollTop > lastScrollTop && scrollTop > 200) {
                    stickyHeader.classList.add('header-up');
                } else {
                    stickyHeader.classList.remove('header-up');
                }
                
                if (scrollTop > 100) {
                    stickyHeader.classList.add('header-sticky');
                } else {
                    stickyHeader.classList.remove('header-sticky');
                }
                
                lastScrollTop = scrollTop;
            });
        }

        // ========================================
        // FORM VALIDATION ENHANCEMENT
        // ========================================
        const contactForm = document.querySelector('.contact-form form');
        if (contactForm) {
            const inputs = contactForm.querySelectorAll('input[type="email"], input[type="text"], textarea');
            
            inputs.forEach(function(input) {
                input.addEventListener('blur', function() {
                    if (this.validity.valid) {
                        this.classList.add('valid');
                        this.classList.remove('invalid');
                    } else if (this.value !== '') {
                        this.classList.add('invalid');
                        this.classList.remove('valid');
                    }
                });
            });
        }

        // ========================================
        // LOG CONSOLE MESSAGE
        // ========================================
        console.log('MILEYM3DIA Theme Loaded');
    });

})();
