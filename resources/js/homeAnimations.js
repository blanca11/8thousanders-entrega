// ============================================
// ARCHIVO: public/js/animations.js
// ============================================
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
// Función de inicialización que se ejecuta cuando el DOM está listo
document.addEventListener('DOMContentLoaded', function() {
    
    // Registrar el plugin ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // ========================================
    // HERO SECTION ANIMATIONS
    // ========================================
    
    // Animación del título con efecto de rebote
    gsap.from('.hero-text h1', {
        duration: 1.2,
        y: -100,
        opacity: 0,
        ease: 'bounce.out',
        delay: 0.2
    });

    // Animación de los párrafos con stagger
    gsap.from('.hero-text p', {
        duration: 0.8,
        x: -50,
        opacity: 0,
        stagger: 0.2,
        ease: 'power2.out',
        delay: 0.6
    });

    // Animación del botón con escala
    gsap.from('.hero-text .button-56', {
        duration: 0.6,
        scale: 0,
        opacity: 0,
        ease: 'back.out(1.7)',
        delay: 1.4
    });

    // Animación de las imágenes del hero con efecto parallax
    gsap.from('.hero-images__izquierda__arriba', {
        duration: 1,
        y: 100,
        opacity: 0,
        ease: 'power3.out',
        delay: 0.3
    });

    gsap.from('.hero-images__izquierda__abajo', {
        duration: 1,
        y: 100,
        opacity: 0,
        ease: 'power3.out',
        delay: 0.5
    });

    gsap.from('.hero-images__derecha__arriba', {
        duration: 1,
        y: -100,
        opacity: 0,
        ease: 'power3.out',
        delay: 0.4
    });

    gsap.from('.hero-images__derecha__abajo', {
        duration: 1,
        y: -100,
        opacity: 0,
        ease: 'power3.out',
        delay: 0.6
    });

    // Efecto hover en imágenes del hero
    document.querySelectorAll('.hero-images .formato').forEach(img => {
        img.addEventListener('mouseenter', () => {
            gsap.to(img, {
                scale: 1.05,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
        
        img.addEventListener('mouseleave', () => {
            gsap.to(img, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });

    // ========================================
    // ABOUT US SECTION ANIMATIONS
    // ========================================
    
    gsap.from('.about-us h2', {
        scrollTrigger: {
            trigger: '.about-us',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
        },
        duration: 0.8,
        y: 50,
        opacity: 0,
        ease: 'power2.out'
    });

    gsap.from('.about-us__image', {
        scrollTrigger: {
            trigger: '.about-us__row',
            start: 'top 75%',
            toggleActions: 'play none none reverse'
        },
        duration: 1,
        x: -100,
        opacity: 0,
        ease: 'power3.out'
    });

    gsap.from('.about-us__content p', {
        scrollTrigger: {
            trigger: '.about-us__row',
            start: 'top 75%',
            toggleActions: 'play none none reverse'
        },
        duration: 0.8,
        x: 100,
        opacity: 0,
        stagger: 0.2,
        ease: 'power2.out'
    });

    gsap.from('.about-us__content .button-56', {
        scrollTrigger: {
            trigger: '.about-us__content',
            start: 'top 70%',
            toggleActions: 'play none none reverse'
        },
        duration: 0.6,
        scale: 0,
        opacity: 0,
        ease: 'back.out(1.7)',
        delay: 0.6
    });

    // ========================================
    // SERVICIOS SECTION ANIMATIONS
    // ========================================
    
    gsap.from('.servicios__festivales', {
        scrollTrigger: {
            trigger: '.servicios',
            start: 'top 75%',
            toggleActions: 'play none none reverse'
        },
        duration: 1,
        y: 100,
        opacity: 0,
        ease: 'power3.out'
    });

    gsap.from('.servicios__london', {
        scrollTrigger: {
            trigger: '.servicios',
            start: 'top 75%',
            toggleActions: 'play none none reverse'
        },
        duration: 1,
        y: 100,
        opacity: 0,
        ease: 'power3.out',
        delay: 0.2
    });

    // Animación de las imágenes circulares con rotación
    gsap.from('.servicios__festivales img', {
        scrollTrigger: {
            trigger: '.servicios__festivales',
            start: 'top 70%',
            toggleActions: 'play none none reverse'
        },
        duration: 1.2,
        scale: 0,
        rotation: 360,
        opacity: 0,
        ease: 'back.out(1.7)'
    });

    gsap.from('.servicios__london img', {
        scrollTrigger: {
            trigger: '.servicios__london',
            start: 'top 70%',
            toggleActions: 'play none none reverse'
        },
        duration: 1.2,
        scale: 0,
        rotation: -360,
        opacity: 0,
        ease: 'back.out(1.7)',
        delay: 0.2
    });

    // ========================================
    // NEWSLETTER SECTION ANIMATIONS
    // ========================================
    
    gsap.from('.subscription h2', {
        scrollTrigger: {
            trigger: '.subscription',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
        },
        duration: 1,
        scale: 0.5,
        opacity: 0,
        ease: 'back.out(1.7)'
    });

    gsap.from('.subscription p', {
        scrollTrigger: {
            trigger: '.subscription',
            start: 'top 75%',
            toggleActions: 'play none none reverse'
        },
        duration: 0.8,
        y: 50,
        opacity: 0,
        ease: 'power2.out',
        delay: 0.3
    });

    gsap.from('.subscription__form', {
        scrollTrigger: {
            trigger: '.subscription',
            start: 'top 70%',
            toggleActions: 'play none none reverse'
        },
        duration: 1,
        y: 100,
        opacity: 0,
        ease: 'power3.out',
        delay: 0.5
    });

    // ========================================
    // BUTTON HOVER ANIMATIONS
    // ========================================
    
    document.querySelectorAll('.button-56').forEach(button => {
        button.addEventListener('mouseenter', () => {
            gsap.to(button, {
                y: -5,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
        
        button.addEventListener('mouseleave', () => {
            gsap.to(button, {
                y: 0,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
        
        button.addEventListener('mousedown', () => {
            gsap.to(button, {
                scale: 0.95,
                duration: 0.1
            });
        });
        
        button.addEventListener('mouseup', () => {
            gsap.to(button, {
                scale: 1,
                duration: 0.1
            });
        });
    });

    // ========================================
    // PARALLAX EFFECT ON SCROLL
    // ========================================
    
    gsap.to('.hero-images__izquierda', {
        scrollTrigger: {
            trigger: '.hero',
            start: 'top top',
            end: 'bottom top',
            scrub: 1
        },
        y: -50,
        ease: 'none'
    });

    gsap.to('.hero-images__derecha', {
        scrollTrigger: {
            trigger: '.hero',
            start: 'top top',
            end: 'bottom top',
            scrub: 1
        },
        y: 50,
        ease: 'none'
    });

    console.log('✅ Animaciones GSAP cargadas correctamente');
});