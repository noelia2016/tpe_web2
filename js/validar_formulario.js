"use strict";

document.addEventListener("DOMContentLoaded", cargarPagina);

function cargarPagina(){

    function comprobarClave(){
        
        // aca toma el evento cuando el usuario completa el formulario y presiona cualquiera de los botones
        let btn_agregar = document.querySelector("#form_registro");
        let clave1 = document.querySelector("#clave");
        let clave2 = document.querySelector("#claveR");

        if (clave1 == clave2)
           alert("Las dos claves son iguales...\nRealizaríamos las acciones del caso positivo")
        else
           alert("Las dos claves son distintas...\nRealizaríamos las acciones del caso negativo")
    }

} // fin de la funcion cargarPagina

