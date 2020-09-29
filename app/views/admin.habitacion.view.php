<?php

class AdminHabitacionView
{

    function mostrarHabitaciones($habitaciones)
    {
        include 'templates/admin.header.php';
        include 'templates/admin.lista.hab.header.php';

        foreach ($habitaciones as $hab) {
            echo "<tr>
                    <td>
                        $hab->nro  
                    </td>    
                    <td>
                        $hab->capacidad 
                    </td> 
                    <td>
                        $hab->nombre_cat 
                    </td>
                    <td>
                        $hab->estado 
                    </td> 
                    <td>
                        <a class='btn btn-danger btn-sm' href='eliminar_hab/$hab->id'>Eliminar
                        </a>
                        <a class='btn btn-info btn-sm' href='editar_hab/$hab->id'>Editar
                        </a>
                    </td> 
                </tr>";
        }
        include 'templates/admin.lista.hab.footer.php';
        include 'templates/footer.php';
    }

    function editarHabitacionVista($habitacion)
    {   
        include 'templates/admin.form.habitacion.php';
        echo "
            nro_habitacion.value = $habitacion->nro ; 
            capacidad.value = $habitacion->capacidad  ;
            categoria.value = $habitacion->nombre_cat ; 
            estado.value = $habitacion->estado ;
          
        <a class='btn btn-info btn-sm' href='actualiz_hab/$habitacion->id'>Guardar</a>
             
         ";
        
        
        include 'templates/footer.php';
    } 
}
