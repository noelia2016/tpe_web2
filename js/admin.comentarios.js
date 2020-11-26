"use strict"

const app = new Vue({
    el: "#app",
    data: {
        comentarios: [], // esto es como un assign de smarty
    }, 
    methods: {
        eliminarComentario: async function (id) {
            
            let url = 'api/comentarios/' + id ;
            console.log(url);
            try {
                const response = await fetch(url, {
                    'method': 'DELETE'
                }).then(res => {
                    res.text();
                    getComentarios();
                }
                ) ;
            
            } catch(e) {
                console.log(e);
            }
        }
        
}
});

document.addEventListener('DOMContentLoaded', e => {
    // obtengo todos los comentarios de la habitacion

    getComentarios();
});


async function getComentarios() {

    // obtengo todos los comentarios para la habitacion pasada por parametro
    try {
        const response = await fetch('api/comentariosadm/');
        const comentarios = await response.json();
        
        // imprimo los comentarios en este caso todos porque el filtro no me anda aun
        app.comentarios = comentarios;

    } catch(e) {
        console.log(e);
    }
}


