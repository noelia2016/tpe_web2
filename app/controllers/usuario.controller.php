<?php

include_once 'app/models/usuario.model.php';
include_once 'app/views/usuario.view.php';
include_once 'app/helpers/sesion.helper.php';

class UsuarioController
{

    private $model;
    private $view;
    private $sesionHelper;

    function __construct()
    {
        $this->model = new UsuarioModel();
        $this->view = new UsuarioView();
        $this->sesionHelper = new SesionHelper();
    }

    /**
     * Imprime la lista de usuarios registrados
     */
    function mostrarTodos($mensaje = null)
    {
        // verifico que el usuario esté logueado siempre
        $this->sesionHelper->checkLogged();

        if (($_SESSION['TIPO_USER'] == 1)) {
            $this->redirigirListaUsuPostActualiz($mensaje);
        } else {
            echo "usted no tiene permisos para realizar esta operacion";
        }
    }

    function mostrarUsuariosPaginado($pagina = null, $mensaje = null)
    {   
        $this->sesionHelper->checkLogged();
        //1) obtener número total de habitaciones para paginar
        $total_registros = $this->model->obtenerCantUsuarios();
      
        //constante
        $itemsPagina = 5;
        //averiguar según número de página
        $inicio = 0;
        //calculo el total de paginas
        $paginas = intval($total_registros/ $itemsPagina) ;
        $resto = $total_registros % $itemsPagina ;
        //si hay resto, sumo 1 a cantidad de páginas
        if ($resto>0){
            $paginas ++;
        }
        if ($total_registros > 0) {
            if ((!$pagina) || ($pagina > $paginas)) {
                $inicio = 0;
                $pagina = 1;
            } else {
                $inicio = ($pagina - 1) * $itemsPagina;
            }
                  
            $usuarios = $this->model->obtenerUsuariosPaginado($inicio, $itemsPagina);
           
            if (isset($usuarios)) {
                $this->view->mostrarUsuarios($usuarios);
            }
        }
    }

    /**
     * Muestro el formulario de inicio de session
     */
    function login()
    {
        // actualizo la vista
        $this->view->login('');
    }

    /**
     * Verifico el login del usuario, si ingresaron los datos correctos
     */
    function verificarInicio()
    {

        $user = $_POST['usuario'];
        $passIngresado = $_POST['password'];

        // verifico que el usuario exista
        $usuario = $this->model->verificarUsuario($user);

        /* verifico que los datos ingresados sean correctos */
        // si el usuario y la contraseña ingresado con correctos
        if (
            !empty($usuario) && password_verify($passIngresado, $usuario->password)
            && ($usuario->habilitado == 1)
        ) {
            // si no devuelve la mando a iniciar session nuevamente notificandolo
            // armo la sesion del usuario
            $this->sesionHelper->login($usuario);
            if ($usuario->es_administrador == 1) {
                // redirigimos al listado de habitaciones
                header("Location: " . BASE_URL . 'admhab');
            } else {
                header("Location: " . BASE_URL . 'home');
            }
        } else {
            //$this->view->login("Credenciales inválidas");
            //echo "entra con error";
        }
    }

    /**
     * Finaliza la sesion de usuario
     */
    function logout()
    {

        $this->sesionHelper->logout();
    }


    /**
     * Muestro el formulario de registro de usuario
     */
    function registrar()
    {

        // actualizo la vista
        $this->view->registrar('');
    }

    /**
     * Chequeo del registro de usuario
     */
    function verificar_registro()
    {

        // tomo los datos ingresados por el usuario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sexo = $_POST['sexo'];
        $fecha_nac = $_POST['fecha_nac'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $password = $_POST['clave'];

        /* debo verificar que el usuario no este registrado antes de que inserte */
        $existe_user = $this->model->existe_user($user);
        if ($existe_user > 0) {
            $mensaje = "El nombre de usuario ya esta registrado. Ingrese otro por favor.";
            $this->view->registrar($mensaje);
        } else {
            // si no hay coincidencias con el nombre de usuario continuo chequeando email
            $exite_email = $this->model->verificarDatos($email);
            if (!empty($exite_email)) {
                $mensaje = "El email ya esta registrado para otro usuario. Ingrese otro por favor.";
                $this->view->registrar($mensaje);
            } else {
                // hago el insert de datos en la base de datos
                $id = $this->model->insertarUsuario($nombre, $apellido, $sexo, $fecha_nac, $email, $user, $password);
                if ($id) {
                    // si se registro correctamente redireciono al login
                    //$this->view->login("Se registro correctamente. Ingrese sus datos por favor.");
                    // si esta todo ok -- logueo al usuario y le muestro la pantalla segun corresponda
                    /**
                     ** aca tenemos que mostrar la pantalla de usuario normal 
                     **/
                    // busco los datos del usuario recientemente insertado
                    $user = $this->model->obtenerUsuario($id);
                    // le creo la session para el autologin
                    $this->sesionHelper->login($user);
                } else {
                    // si no se registra en la base de datos
                    $this->view->registrar("Ups!! Ocurrio un error vuelva a intentarlo.");
                }
            } // fin del else de existe_email
        } // fin del else de existe_user

    }

    /**
     * Muestro el form de actualizacion de password
     */
    function recuperarPassword()
    {
        // actualizo la vista
        $this->view->actualizarPass('');
    }


    /**
     * Chequeo el cambio de password
     */
    function actualizar_pass()
    {

        // tomo los datos ingresados por el usuario
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $passwordNueva = $_POST['claveNueva'];

        /* debo verificar que el usuario este registrado antes de que actualice */
        $datos = $this->model->verificarDatos($email);

        // cuando cambie a bcrypt password_verify($password, $user->password)
        if ($datos && $datos->user = $usuario) {
            // si los datos ingresados existen realizo la modificacion de la pass
            // hago el insert de datos en la base de datos

            $id = $this->model->actualizarPass($passwordNueva, $datos->id);

            // comprobamos que el número de filas afectadas que devuelve la consulta sea mayor que 0
            /*if ($id->rowCount() > 0){*/
            if ($id) {
                // si se registro el cambio correctamente lo direcciono al login
                $this->view->login('El cambio se registro correctamente. Ingrese con su nuevo password');
            } else {
                // si no se registro el cambio lo notifico
                $this->view->actualizarPass("Ups! Ocurrio un error intente mas tarde.");
            }
        } else {
            // si el email y usuario no coinciden para los datos registrados de un usuario
            $this->view->actualizarPass("Los datos ingresados no coinciden con los registrados. Verifique y vuelve a intentarlo.");
        }
    }

    /**
     * Eliminar un usuario registrado
     */
    function eliminarUsuario($id)
    {
        // elimino el usuario de la BD
        $exito = false;
        // verifico que el usuario esté logueado siempre
        $this->sesionHelper->checkLogged();
        if (($_SESSION['TIPO_USER'] == 1)) {
            if (is_numeric($id)) {
                $idU = $this->model->eliminarUsuarioMdl($id);
                if ($idU > 0) {
                    //echo "entro por aca eliminando bien el usuario";
                    $mensaje = "El usuario fue eliminado correctamente";
                    $exito = true;
                } else {
                    //echo "entro por error";
                    $mensaje = "Ups!! Ocurrio un error vuelva a intentar";
                }
                $this->redirigirListaUsuPostActualiz($mensaje, $exito);
            } else {
                // si no viene un numero por parametro
                $camino = 'listar_usuarios';
                $this->view->pantallaDeError($camino);
            }
        } else {
            echo "usted no tiene permisos para realizar esta operacion";
        }
    }


    function editarUsuario($id)
    {
        // verifico que el usuario esté logueado siempre
        $this->sesionHelper->checkLogged();
        /* verifico que el usuario sea administrador para poder realizar operacion */
        if (($_SESSION['TIPO_USER'] == 1)) {
            if (is_numeric($id)) {
                $usuario = $this->model->obtenerUsuario($id);
                // actualizo la vista cargando los datos en el formulario de usuario
                if ($usuario) {
                    $this->view->editarUsuarioVista($usuario);
                } else {
                    $mensaje = "No se pudo recuperar el usuario solicitado";
                    $this->mostrarTodos($mensaje);
                }
            } else {
                $camino = 'listar_usuarios';
                $this->view->pantallaDeError($camino);
            }
        } else {
            // si no es usuario debe notificarle que no puede realizar esa accion
            $camino = 'home';
            // VER COMO NOTIFICO EL ERROR
            $this->view->pantallaDeError($camino);
        }
    }
    function guardarUsuario()
    {
        $this->sesionHelper->checkLogged();
        $exito = false;
        $habilitado = $_POST['habilitado'];
        $es_administrador = $_POST['es_administrador'];
        // verifico campos obligatorios
        if (!isset($habilitado) || !isset($es_administrador)) {
            $mensaje = "Debe indicar datos de usuario a actualizar";
        } else {
            if (isset($_POST['id_usuario'])) {
                $id = $_POST['id_usuario'];
                $exito = ($this->model->actualizarUsuarioMdl(
                    $id,
                    $habilitado,
                    $es_administrador
                )) > 0;
                $mensaje = "Se actualizaron los datos del usuario";
            } else {

                //Si el administrador tuviera opción de alta de usuario
            }
        }
        $this->redirigirListaUsuPostActualiz($mensaje, $exito);
    }

    function redirigirListaUsuPostActualiz($mensaje, $exito = null)
    {
        $usuarios = $this->model->obtenerUsuarios();
        $this->view->mostrarUsuarios($usuarios, $mensaje, $exito);
    }
}
