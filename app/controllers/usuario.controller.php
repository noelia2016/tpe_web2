<?php

include_once 'app/models/usuario.model.php';
include_once 'app/views/usuario.view.php';
include_once 'app/helpers/sesion.helper.php';

class UsuarioController {

    private $model;
    private $view;
    private $sesionHelper;

    function __construct() {
        $this->model = new UsuarioModel();
        $this->view = new UsuarioView();
        $this->sesionHelper = new SesionHelper();
    }

    /**
     * Imprime la lista de usuarios registrados
     */
    function mostrarTodos(){
        
       // verifico que el usuario esté logueado siempre
       $this->sesionHelper->checkLogged();
       
       // obtiene las diferentes categorias del modelo
       $usuarios = $this->model->obtenerUsuarios();

       // actualizo la vista
       $this->view->mostrarUsuarios($usuarios, '');
        
    }
    
    /**
     * Muestro el formulario de inicio de session
     */
    function login(){
       // actualizo la vista
       $this->view->login('');
        
    }
    
    /**
     * Verifico el login del usuario, si ingresaron los datos correctos
     */
    function verificarInicio(){
       
        $user = $_POST['usuario'];
        $pass = $_POST['password'];
        
        // verifico que el usuario exista
        $usuario = $this->model->verificar($user);
        
        /* verifico que los datos ingresados sean correctos */
        if ($usuario && $usuario->password == md5($pass)){
            // si no devuelve la mando a iniciar session nuevamente notificandolo
            // armo la sesion del usuario
            $this->sesionHelper->login($usuario);

            // redirigimos al listado
            header("Location: " . BASE_URL . 'admhab'); 
        } else {
            $this->view->login("Credenciales inválidas");
        }

    }
    
    /**
     * Finaliza la sesion de usuario
     */
    function logout() {
        
        $this->sesionHelper->logout();
    }

    
    /**
     * Muestro el formulario de registro de usuario
     */
     function registrar(){
         
       // actualizo la vista
       $this->view->registrar('');
        
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
            $this->view->login("Se registro correctamente. Ingrese sus datos por favor.");
        }else{
            // si no se registra en la base de datos
            $this->view->registrar("Ups!! Ocurrio un error vuelva a intentarlo.");
        }           
   
    }   
    
    /**
     * Muestro el form de actualizacion de password
     */  
    function recuperarPassword(){
       // actualizo la vista
       $this->view->actualizarPass('');      
    }
    
     
     /**
     * Chequeo el cambio de password
     */
     function actualizar_pass(){    
            
        // tomo los datos ingresados por el usuario
        $email=$_POST['email'];
        $usuario=$_POST['usuario'];
        $passwordNueva=$_POST['claveNueva'];
        
        /* debo verificar que el usuario este registrado antes de que actualice */
        $datos= $this->model->verificarDatos($email);
        
        // cuando cambie a bcrypt password_verify($password, $user->password)
        if ($datos && $datos->user = $usuario){
            // si los datos ingresados existen realizo la modificacion de la pass
            // hago el insert de datos en la base de datos

            $id= $this->model->actualizarPass($passwordNueva,$datos->id);
            
            // comprobamos que el número de filas afectadas que devuelve la consulta sea mayor que 0
            /*if ($id->rowCount() > 0){*/
            if ($id){
                // si se registro el cambio correctamente lo direcciono al login
                $this->view->login('El cambio se registro correctamente. Ingrese con su nuevo password');
            }else{
                // si no se registro el cambio lo notifico
                $this->view->actualizarPass("Ups! Ocurrio un error intente mas tarde.");
            } 
        }else{
            // si el email y usuario no coinciden para los datos registrados de un usuario
           $this->view->actualizarPass("Los datos ingresados no coinciden con los registrados. Verifique y vuelve a intentarlo."); 
        }
        
    }
    
    /**
     * Eliminar un usuario registrado
     */  
    function eliminar($id){
       // elimino el usuario de la BD
       
       // verifico que el usuario esté logueado siempre
       $this->sesionHelper->checkLogged();
       if (is_numeric($id)){
           $idU= $this->model->eliminar($id);
           if ($idU > 0){
               //echo "entro por aca eliminando bien el usuario";
               $mensaje="El usuario fue eliminado correctamente";
           }else{
               //echo "entro por error";
               $mensaje="Ups!! Ocurrio un error vuelva a intentar";
           }          
            // obtiene las diferentes categorias del modelo
            $usuarios = $this->model->obtenerUsuarios();
            $this->view->mostrarUsuarios($usuarios,$mensaje); 
       }else{
           // si no viene un numero por parametro
           $camino='listar_usuarios';
           $this->view->pantallaDeError($camino);
       }
    }
    
    /**
     * Deshabilita o habilita temporalmete un usuario segun este por desicion del moderador
     */  
    function deshabilitar($id){
       // elimino el usuario de la BD
       
       // verifico que el usuario esté logueado siempre
       $this->sesionHelper->checkLogged();
       if (is_numeric($id)){
           // verifica el estado del usuario
           $estadoV=$this->model->verificarEstado($id);
           if ($estadoV == 'TRUE'){
               $estado=FALSE;
           }else{
               $estado=TRUE;
           }    
           
           // cambio el estado del usuario
           $idU= $this->model->deshabilitar($id,$estado);
           if ($idU){
               $mensaje="El usuario fue des/habilitado temporalmente";
           }else{
               $mensaje="Ups!! Ocurrio un error vuelva a intentar";
           }
           $this->mostrarTodos($mensaje);  
       }else{
           // si no viene un numero por parametro
           $camino='listar_usuarios';
           $this->view->pantallaDeError($camino);
       }
    }
    

}
?>