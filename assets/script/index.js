document.addEventListener('DOMContentLoaded', function () {
    // Inicializar AOS (Animate On Scroll)
    AOS.init();

    // Inicializar Swiper
    const swiper = new Swiper('.swiper-container', {
        loop: true,
        spaceBetween: 20,
        slidesPerView: 1,
        breakpoints: {
            640: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 }
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        preventClicks: true
    });

    // Animación de Título Dinámico
    const words = ['Fuerte', 'Valiente', 'Inspirador'];
    const wordElement = document.querySelector('.dynamic-word');

    if (wordElement) {
        let currentIndex = 0;

        function changeWord() {
            wordElement.textContent = words[currentIndex];
            currentIndex = (currentIndex + 1) % words.length;
        }

        setInterval(changeWord, 2000); // Cambia cada 2 segundos
    }

    // Efecto Parallax en el Encabezado
    window.addEventListener('scroll', function () {
        const scrollPosition = window.scrollY;
        const header = document.querySelector('.header-section');
        if (header) {
            header.style.backgroundPositionY = `${scrollPosition * 0.3}px`;
        }
    });

    // Animación de botón "Conócenos"
    const heroButton = document.querySelector('.hero-content .btn');
    if (heroButton) {
        heroButton.addEventListener('mouseenter', () => {
            heroButton.style.transform = 'scale(1.1)';
        });
        heroButton.addEventListener('mouseleave', () => {
            heroButton.style.transform = 'scale(1)';
        });
    }
});