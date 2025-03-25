document.addEventListener('DOMContentLoaded', function () {
    // Agregar animaciones o efectos adicionales aquí
    console.log("¡El sitio web se ha cargado correctamente!");

    // Ejemplo: Cambiar el color del botón al pasar el mouse
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