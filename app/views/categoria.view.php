<?php

class CategoriaView {

    /** 
        Muestra el listado de categorias existentes 
    **/
    function mostrarCategorias($categorias) {
        include 'templates/header.php';

        echo "<ul class='list-group mt-5'>";
        foreach($categorias as $cat) {
            echo "<li class='list-group-item'>
                    $cat->nombre | $cat->descripcion
                </li>";
        }
        echo "</ul>";

    
        include 'templates/footer.php';
    }
    
}