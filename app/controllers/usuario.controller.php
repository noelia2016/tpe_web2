<?php

include_once 'app/models/usuario.model.php';
include_once 'app/views/usuario.view.php';

class UsuarioController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new UsuarioModel();
        $this->view = new UsuarioView();
    }

    /**
     * Imprime la lista de usuarios registrados
     */
    function mostrarTodos(){
        // obtiene las diferentes categorias del modelo
        $usuarios = $this->model->getAll();

       // actualizo la vista
       $this->view->mostrarUsuarios($usuarios);
        
    }
    
    /**
     * Muestro el formulario de inicio de session
     */
    function login(){
       // actualizo la vista
       $this->view->login();
        
    }
    
    /**
     * Verifico el login del usuario, si ingresaron los datos correctos
     */
    function verificarInicio(){
       
        $user = $_POST['user'];
        $pass = $_POST['password'];

        // verifico campos obligatorios
        if (empty($user) || empty($pass)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }
        
        $valido = $this->model->verificar($user, $pass);
        
        if (empty($valido)){
            // si no devuelve la mando a iniciar session nuevamente notificandolo
            $this->view->showError('Los datos ingresados son incorrectos');
            die();
            
            // DEBERIA HACERLO DE OTRA FORMA AQUI
        }
        
        // si paso todo bien entonces le muestro el panel de usuario
        header("Location: " . BASE_URL); 
    }
    
    /**
     * Muestro el formulario de registro de usuario
     */
    function registroUser(){    
          
       // actualizo la vista
       $this->view->registrar();  
       
       if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
            // tomo los datos ingresados por el usuario
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $sexo=$_POST['sexo'];
            $fecha_nac=$_POST['fecha_nac'];
            $email=$_POST['email'];
            $user=$_POST['user'];
            $password=$_POST['clave'];
            
            // hago el insert de datos en la base de datos
            $id=insertar($nombre, $apellido, $sexo, $fecha_nac, $email, $user, $password);
            if ($id != 0){
                // si se registro correctamente redireciono al login
                header("Location: " . login);
            }else{
                echo "ocurrio un error vuelva a intentarlo jeje";
            }    
       }
       
   
    }   
             
    function actualizarPassword(){
       // actualizo la vista
       $this->view->registrar();
        
    }
    

}
?>