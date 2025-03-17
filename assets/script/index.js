// Prevenir el desplazamiento de la página al interactuar con el swiper
document.querySelector('.swiper-container').addEventListener('touchstart', function(e) {
    e.preventDefault();
});

// Inicializar Swiper
var swiper = new Swiper('.swiper-container', {
    loop: true, // Habilitar el loop para que el swiper vuelva a empezar cuando se llegue al final
    spaceBetween: 10, // Espacio entre las imágenes
    slidesPerView: 1, // Muestra una imagen por vez
    pagination: {
        el: '.swiper-pagination', // Elemento de paginación
        clickable: true, // Hacer que los puntos de la paginación sean clickeables
    },
    navigation: {
        nextEl: '.swiper-button-next', // Botón siguiente
        prevEl: '.swiper-button-prev', // Botón anterior
    },
    preventClicks: true, // Previene que el swiper haga clic de manera no deseada
});
window.addEventListener('scroll', function () {
    let scrollPosition = window.scrollY;
    document.querySelector('header').style.backgroundPositionY = (scrollPosition * 0.3) + 'px';
});
