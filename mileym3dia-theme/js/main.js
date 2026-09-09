/**
 * MILEYM3DIA Theme - Main JavaScript
 */

(function() {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        
        // Scroll Progress Bar
        const scrollProgress = document.getElementById('scrollProgress');
        if (scrollProgress) {
            window.addEventListener('scroll', function() {
                const scrollTop = window.scrollY;
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const scrollPercent = (scrollTop / docHeight) * 100;
                scrollProgress.style.width = scrollPercent + '%';
            });
        }

        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenuClose = document.getElementById('mobileMenuClose');
        const navMobile = document.getElementById('navMobile');
        
        if (mobileMenuToggle && navMobile) {
            mobileMenuToggle.addEventListener('click', function() {
                navMobile.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        }
        
        if (mobileMenuClose && navMobile) {
            mobileMenuClose.addEventListener('click', function() {
                navMobile.classList.remove('active');
                document.body.style.overflow = '';
            });
        }

        // Header scroll effect
        const siteHeader = document.getElementById('siteHeader');
        if (siteHeader) {
            let lastScroll = 0;
            window.addEventListener('scroll', function() {
                const currentScroll = window.scrollY;
                
                if (currentScroll > 100) {
                    siteHeader.style.background = 'rgba(10, 10, 10, 0.95)';
                } else {
                    siteHeader.style.background = 'rgba(10, 10, 10, 0.9)';
                }
                
                lastScroll = currentScroll;
            });
        }

        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements for animation
        const animateElements = document.querySelectorAll('.work-item, .service-card, .blog-card, .capability-item, .resource-item');
        animateElements.forEach(function(el) {
            el.style.opacity = '0';
            observer.observe(el);
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // Capability items hover effect enhancement
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

        // Parallax effect for hero grid
        const heroGrid = document.querySelector('.hero-grid');
        const heroMark = document.querySelector('.hero-mark');
        
        if (heroGrid || heroMark) {
            window.addEventListener('scroll', function() {
                const scrolled = window.scrollY;
                
                if (heroGrid && scrolled < window.innerHeight) {
                    heroGrid.style.transform = 'translateY(' + (scrolled * 0.3) + 'px)';
                }
                
                if (heroMark && scrolled < window.innerHeight) {
                    heroMark.style.transform = 'translateY(' + (scrolled * 0.2) + 'px)';
                }
            });
        }

        // Add loaded class to body for CSS transitions
        document.body.classList.add('loaded');

        // Cursor effect (optional, can be removed if not desired)
        const cursor = document.createElement('div');
        cursor.className = 'custom-cursor';
        cursor.innerHTML = '<div class="cursor-dot"></div><div class="cursor-ring"></div>';
        
        // Only add custom cursor on non-touch devices
        if (!('ontouchstart' in window)) {
            document.body.appendChild(cursor);
            
            const cursorDot = cursor.querySelector('.cursor-dot');
            const cursorRing = cursor.querySelector('.cursor-ring');
            
            let mouseX = 0, mouseY = 0;
            let ringX = 0, ringY = 0;
            
            document.addEventListener('mousemove', function(e) {
                mouseX = e.clientX;
                mouseY = e.clientY;
                
                if (cursorDot) {
                    cursorDot.style.left = mouseX + 'px';
                    cursorDot.style.top = mouseY + 'px';
                }
            });
            
            function animateCursor() {
                ringX += (mouseX - ringX) * 0.15;
                ringY += (mouseY - ringY) * 0.15;
                
                if (cursorRing) {
                    cursorRing.style.left = ringX + 'px';
                    cursorRing.style.top = ringY + 'px';
                }
                
                requestAnimationFrame(animateCursor);
            }
            animateCursor();
            
            // Hover states for interactive elements
            const interactiveElements = document.querySelectorAll('a, button, .capability-item, .work-item, .service-card');
            interactiveElements.forEach(function(el) {
                el.addEventListener('mouseenter', function() {
                    if (cursorRing) {
                        cursorRing.style.transform = 'scale(1.5)';
                        cursorRing.style.borderColor = '#EF252C';
                    }
                });
                
                el.addEventListener('mouseleave', function() {
                    if (cursorRing) {
                        cursorRing.style.transform = 'scale(1)';
                        cursorRing.style.borderColor = 'var(--color-off-white)';
                    }
                });
            });
        }

        console.log('MILEYM3DIA Theme Loaded');
    });

})();
