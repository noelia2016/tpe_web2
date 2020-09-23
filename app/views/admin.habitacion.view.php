<?php 

class AdminHabitacionView {

    function showTasks($tasks) {
        include 'templates/header_admin.php';
        include 'templates/form_alta.php';

        echo "<ul class='list-group mt-5'>";
        foreach($habitaciones as $hab) {
            echo "<li class='list-group-item'>
                    $hab->titulo | $hab->capacidad | $hab->estado 
                    <a class='btn btn-danger btn-sm' href='eliminar/$hab->id'>ELIMINAR</a>
                    <a class='btn btn-info btn-sm' href='finalizar/$hab->id'>Finalizar</a>
                    
                </li>";
        }
        echo "</ul>";

    
        include 'templates/footer.php';
    }

}