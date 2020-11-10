"use strict";
// cargo el num random para el formulario
document.addEventListener("DOMContentLoaded", cargarPagina);

function cargarPagina(){
    
    // aca toma el evento cuando el usuario completa el formulario y presiona cualquiera de los botones
    let btn_agregar = document.querySelector("#form_registro");
    let clave1 = document.querySelector("#clave");
    let clave2 = document.querySelector("#claveR");


    btn.addEventListener("submit", function(event){
        // cancela la propagacion del evento
        event.preventDefault();
        
        // llama a la funcion para validar el captcha
        comprobarClave(clave1.value, clave2.value);
    });
    
    function comprobarClave(clave1, clave2){
        // compueba que ambas contraseñas ingresadas sean las mismas
        if (clave1 == clave2){
            $mensaje="Las dos claves son distintas...\nRealizaríamos las acciones del caso negativo";
        }
        return false;
    }

} 