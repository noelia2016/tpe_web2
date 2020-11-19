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
    //console.log(hab.value);
    //getComentarios(hab.value);
    getComentarios();
    document.querySelector('#opinion-form').addEventListener('submit', e => {
        e.preventDefault();
        addComentario();
    });

});

//async function getComentarios(hab) {
    async function getComentarios() {
    // obtengo todos los comentarios para la habitacion pasada por parametro
    try {
        const response = await fetch('api/comentarios/'/* + hab*/);
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
        puntos: document.querySelector('input[name=puntos]').value,
        opinion: document.querySelector('textarea[name=opinion]').value,
        usuario: document.querySelector('input[name=usuario]').value,
        habitacion: document.querySelector('input[name=habitacion]').value
    }

    try {
        const response = await fetch('api/comentarios', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(comentario)
        });

        const t = await response.json();
        app.comentarios.push(t);

    } catch(e) {
        console.log(e);
    }


}


