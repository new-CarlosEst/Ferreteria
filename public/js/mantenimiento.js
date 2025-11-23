const mantenimiento = document.getElementsByClassName("mantenimiento");

Array.from(mantenimiento).forEach(elemento => {
    elemento.addEventListener("click", () => {
        window.alert("Esta función está en mantenimiento");
    });
});