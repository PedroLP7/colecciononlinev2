document.addEventListener("DOMContentLoaded", function() {
    // Obtenemos todos los botones "DETAILS"
    let mostrarBotones = document.querySelectorAll(".mostrarBoton");

    mostrarBotones.forEach(function(boton) {
        boton.addEventListener("click", function() {
            // Buscamos el elemento hermano siguiente que es el div de descripción
            let descripcionDiv = boton.nextElementSibling;

            if (descripcionDiv.style.display === 'none' || descripcionDiv.style.display === '') {
                descripcionDiv.style.display = 'block';
            } else {
                descripcionDiv.style.display = 'none';
            }
        });
    });
});






