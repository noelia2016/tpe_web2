"use strict"

const app = new Vue({
    el: "#app",
    data: {
        comentarios: [], // esto es como un assign de smarty
    }, 
});

document.addEventListener('DOMContentLoaded', e => {
    // obtengo todos los comentarios de la habitacion

    getComentarios();
});

//async function getComentarios(hab) {
async function getComentarios() {

    // obtengo todos los comentarios para la habitacion pasada por parametro
    try {
        const response = await fetch('api/comentariosAdm/');
        const comentarios = await response.json();
        
        // imprimo los comentarios en este caso todos porque el filtro no me anda aun
        app.comentarios = comentarios;

    } catch(e) {
        console.log(e);
    }
}



