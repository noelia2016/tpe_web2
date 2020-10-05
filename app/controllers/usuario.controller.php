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
        
        $usuario = $this->model->verificar($user);
        
        /* verifico que los datos ingresados sean correctos */
        if ($usuario && $usuario->password == md5($pass)){
            // si no devuelve la mando a iniciar session nuevamente notificandolo
            $this->view->showError('Los datos ingresados son incorrectos');
            die();
            
            // DEBERIA HACERLO DE OTRA FORMA AQUI
        }else{
            // si paso todo bien entonces le muestro el panel de usuario
            header("Location: " . BASE_URL); 
        }
        
        
    }
    
    /**
     * Muestro el formulario de registro de usuario
     */
     function registrar(){
         
       // actualizo la vista
       $this->view->registrar();
        
     }
     
     /**
     * Chequeo del registro de usuario
     */
     function verificar_registro(){    
            
        // tomo los datos ingresados por el usuario
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $sexo=$_POST['sexo'];
        $fecha_nac=$_POST['fecha_nac'];
        $email=$_POST['email'];
        $user=$_POST['user'];
        $password=$_POST['clave'];
        
        /* debo verificar que el usuario no este registrado antes de que inserte pero con ajax */
        
        // hago el insert de datos en la base de datos
        $id= $this->model->insertar($nombre, $apellido, $sexo, $fecha_nac, $email, $user, $password);
        if ($id){
            // si se registro correctamente redireciono al login
            header("Location: " . login);
        }else{
            echo "Ocurrio un error vuelva a intentarlo jeje";
        }           
   
    }   
    
    /**
     * Muestro el form de actualizacion de password
     */
    function actualizarPassword($){
       // actualizo la vista
       $this->view->actualizarPass();
        
    }
    
     
     /**
     * Chequeo el cambio de password
     */
     function actualizar_pass(){    
            
        // tomo los datos ingresados por el usuario
        $email=$_POST['email'];
        $passAnt=$_POST['claveAnt'];
        $passwordNueva=$_POST['claveNueva'];
        
        /* debo verificar que el usuario este registrado antes de que actualice */
        $datos= $this->model->verificarDatos($email);
        
        // cuando cambie a bcrypt password_verify($password, $user->password)
        if ($datos && $datos->password = md5(passAnt)){
            // si los datos ingresados existen realizo la modificacion de la pass
            // hago el insert de datos en la base de datos
            $id= $this->model->actualizarPass($password,$id);
            if ($id){
                // si se registro correctamente redireciono al login
                header("Location: " . BASE_URL . "login");
            }else{
                echo "Ocurrio un error vuelva a intentarlo jeje";
            } 
        }else{
           echo "Los datos que ingreso no coinciden con los registrados jeje"; 
        }
        
                  
   
    }
    

}
?>