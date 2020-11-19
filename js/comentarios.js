"use strict"

const app = new Vue({
    el: "#app",
    data: {
        comentarios: [], // esto es como un assign de smarty
    }, 
});

document.addEventListener('DOMContentLoaded', e => {
    // obtengo todos los comentarios de la habitacion
    let hab=document.querySelector('#habitacion');

    getComentarios(hab.value);
    document.querySelector('#opinion-form').addEventListener('submit', e => {
        e.preventDefault();
        addComentario();
    });

});

//async function getComentarios(hab) {
    async function getComentarios(hab) {
    // obtengo todos los comentarios para la habitacion pasada por parametro
    try {
        const response = await fetch('api/comentarios/' + hab);
        const comentarios = await response.json();
        
        // imprimo los comentarios en este caso todos porque el filtro no me anda aun
        app.comentarios = comentarios;

    } catch(e) {
        console.log(e);
    }
}


async function addComentario() {
    // inserto un nuevo comentario    
    
    // armo mi nuevo comentario
    const comentario = {
        puntuacion: document.querySelector('input[name=puntos]').value,
        mensaje: document.querySelector('textarea[name=opinion]').value,
        usuario_id: document.querySelector('input[name=usuario]').value,
        habitacion_id: document.querySelector('input[name=habitacion]').value
    };
    console.log(comentario);
    try {
        const response = await fetch('api/comentarios' , {
            method: 'POST',
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(comentario)
        });

        const t = await response.json();
        // agrega el comentario a la lista de comentarios
        app.comentarios.push(t);

    } catch(e) {
        console.log(e);
    }


}


