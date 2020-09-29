<?php

class AdminCategoriaView
{

    function mostrarListaCategorias($categorias)
    {
        include 'templates/admin.header.php';
        include 'templates/admin.lista.cat.header.php';

        foreach ($categorias as $cat) {
            echo "<tr>
                    <td>
                        $cat->nombre  
                    </td>    
                    <td>
                        $cat->descripcion 
                    </td> 
                    <td>
                        <a class='btn btn-danger btn-sm' href='eliminar_cat/$cat->id'>Eliminar
                        </a>
                        <a class='btn btn-info btn-sm' href='editar_cat/$cat->id'>Editar
                        </a>
                    </td> 
                </tr>";
        }
        include 'templates/admin.lista.cat.footer.php';
        include 'templates/admin.edit.categoria.php';
        include 'templates/footer.php';
    }
}
