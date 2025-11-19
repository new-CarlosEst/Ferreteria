//selecciono tanto el ojo como le campo contraseña
const ojo = document.getElementById("verContra");
const inputPassword = document.getElementById("contra");

//Hago un booleando para saber si la contraseña esta visible o no
let passVisible = false;

//añado un event listener
ojo.addEventListener("click", () =>{
    if (passVisible){
        passVisible = false;
        inputPassword.type = "password";
        ojo.src = "../public/resources/icons/CloseEye.png";
    }
    else {
        passVisible = true;
        inputPassword.type = "text";
        ojo.src = "../public/resources/icons/OpenEye.png";
    }
});