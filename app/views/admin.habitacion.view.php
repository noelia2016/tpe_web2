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
                        $hab->estado 
                    </td> 
                    <td>
                        <a class='btn btn-danger btn-sm' href='eliminar/$hab->id'>Eliminar
                        </a>
                    </td> 
                    <td>
                        <a class='btn btn-info btn-sm' href='editar/$hab->id'>Editar
                        </a>
                    </td> 
                </tr>";
        }
        include 'templates/admin.lista.hab.footer.php';
        include 'templates/admin.edit.habitacion.php';
        include 'templates/footer.php';
    }
}
