document.addEventListener('DOMContentLoaded', function () {
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

    // Efecto Parallax en el Encabezado
    window.addEventListener('scroll', function () {
        const scrollPosition = window.scrollY;
        const header = document.querySelector('.hero-section');
        if (header) {
            header.style.backgroundPositionY = `${scrollPosition * 0.3}px`;
        }
    });

    // Animación de botón "Conócenos"
    const heroButton = document.querySelector('.hero-content a');
    heroButton.addEventListener('mouseenter', () => {
        heroButton.style.transform = 'scale(1.1)';
    });
    heroButton.addEventListener('mouseleave', () => {
        heroButton.style.transform = 'scale(1)';
    });
});