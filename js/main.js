// ============================================================
// ARCHIVO: js/main.js
// CONCEPTO: JavaScript del lado del CLIENTE
// A diferencia de PHP (que corre en el servidor antes de enviar la página),
// JS corre en el navegador del usuario DESPUÉS de cargar la página.
// Esto permite interactividad en tiempo real sin recargar.
// ============================================================

// DOMContentLoaded: espera a que el HTML esté completamente cargado
// antes de ejecutar cualquier código JS
document.addEventListener('DOMContentLoaded', () => {

    // --------------------------------------------------------
    // 1. EFECTO TYPEWRITER — escribe el texto letra por letra
    // --------------------------------------------------------
    // Buscamos el elemento con la clase .typewriter en el DOM
    const typewriterEl = document.querySelector('.typewriter');

    if (typewriterEl) {
        // El texto viene del atributo data-text que pusimos desde PHP
        // dataset es la forma de acceder a atributos data-* en JS
        const texto = typewriterEl.dataset.text;
        let index = 0;

        function escribir() {
            if (index < texto.length) {
                // Agregamos una letra a la vez al contenido del elemento
                typewriterEl.textContent += texto.charAt(index);
                index++;
                // setTimeout ejecuta una función después de X milisegundos
                // Aquí llamamos a escribir() cada 60ms → efecto de escritura
                setTimeout(escribir, 60);
            }
        }

        // Iniciamos después de 1.2s (para que la animación CSS del hero termine)
        setTimeout(escribir, 1200);
    }

    // --------------------------------------------------------
    // 2. NAVBAR — se oscurece al hacer scroll
    // --------------------------------------------------------
    const nav = document.querySelector('nav');

    // addEventListener('scroll') escucha cuando el usuario scrollea
    window.addEventListener('scroll', () => {
        // window.scrollY = cuántos píxeles bajó el scroll
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');    // Añade la clase CSS
        } else {
            nav.classList.remove('scrolled'); // La quita si volvemos arriba
        }
    });

    // --------------------------------------------------------
    // 3. MENÚ HAMBURGUESA (móvil)
    // --------------------------------------------------------
    const toggle = document.querySelector('.nav-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (toggle) {
        toggle.addEventListener('click', () => {
            // classList.toggle añade la clase si no está, la quita si está
            navLinks.classList.toggle('open');
        });

        // Cerrar menú al hacer clic en un link
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('open');
            });
        });
    }

    // --------------------------------------------------------
    // 4. INTERSECTION OBSERVER — animaciones al hacer scroll
    // --------------------------------------------------------
    // El Intersection Observer es una API moderna del navegador.
    // "Observa" elementos y nos avisa cuando entran al viewport
    // (la parte visible de la pantalla).
    // Mucho más eficiente que escuchar el evento 'scroll' constantemente.

    const observer = new IntersectionObserver(
        (entries) => {
            // entries = array de todos los elementos observados
            entries.forEach(entry => {
                // entry.isIntersecting = true si el elemento es visible
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');

                    // Si es una skill-card, también animamos la barra
                    // después de un pequeño delay para que se vea bonito
                    if (entry.target.classList.contains('skill-card')) {
                        // La barra se anima via CSS usando .visible (ya definido en style.css)
                    }

                    // Dejar de observar una vez que ya se mostró
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.15, // El elemento debe estar 15% visible para activarse
            rootMargin: '0px 0px -50px 0px' // Activa 50px antes de que entre completamente
        }
    );

    // Observamos todos los elementos con clase .reveal y .skill-card
    document.querySelectorAll('.reveal, .skill-card').forEach(el => {
        observer.observe(el);
    });

    // --------------------------------------------------------
    // 5. SMOOTH SCROLL para links de navegación
    // --------------------------------------------------------
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        // 'a[href^="#"]' selecciona todos los <a> cuyo href empieza con #
        link.addEventListener('click', (e) => {
            e.preventDefault(); // Previene el comportamiento por defecto del browser

            const targetId = link.getAttribute('href');
            const targetEl = document.querySelector(targetId);

            if (targetEl) {
                // Calculamos la posición del elemento menos la altura del nav
                const navHeight = nav.offsetHeight;
                const targetPos = targetEl.getBoundingClientRect().top + window.scrollY - navHeight;

                window.scrollTo({
                    top: targetPos,
                    behavior: 'smooth'
                });
            }
        });
    });

    // --------------------------------------------------------
    // 6. CURSOR personalizado (sutil efecto de brillo)
    // --------------------------------------------------------
    const cursor = document.createElement('div');
    cursor.className = 'cursor-glow';
    cursor.style.cssText = `
        position: fixed;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(108,99,255,0.06) 0%, transparent 70%);
        pointer-events: none;
        transform: translate(-50%, -50%);
        z-index: 0;
        transition: opacity 0.3s ease;
    `;
    document.body.appendChild(cursor);

    document.addEventListener('mousemove', (e) => {
        // Movemos el brillo a la posición del cursor
        cursor.style.left = e.clientX + 'px';
        cursor.style.top  = e.clientY + 'px';
    });

    // --------------------------------------------------------
    // 7. ACTIVE NAV LINK — resalta el link de la sección actual
    // --------------------------------------------------------
    const sections = document.querySelectorAll('section[id]');
    const navLinksAll = document.querySelectorAll('.nav-links a');

    window.addEventListener('scroll', () => {
        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop - 120;
            if (window.scrollY >= sectionTop) {
                current = section.getAttribute('id');
            }
        });

        navLinksAll.forEach(link => {
            link.style.color = '';
            if (link.getAttribute('href') === `#${current}`) {
                link.style.color = 'var(--color-primario)';
            }
        });
    });

});