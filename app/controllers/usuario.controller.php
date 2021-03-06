<?php

include_once 'app/models/usuario.model.php';
include_once 'app/views/usuario.view.php';
include_once 'app/helpers/sesion.helper.php';
include_once 'app/helpers/error.helper.php';

class UsuarioController
{

    private $model;
    private $view;
    private $sesionHelper;
    private $errorHelper;

    function __construct()
    {
        $this->model = new UsuarioModel();
        $this->view = new UsuarioView();
        $this->sesionHelper = new SesionHelper();
        $this->errorHelper = new ErrorHelper();
    }

    /**
     * Imprime la lista de usuarios registrados
     */
    function mostrarTodos($mensaje = null)
    {
        // verifico que el usuario esté logueado siempre
        if ($this->sesionHelper->esta_logueadoAdministrador()) {
           // $this->redirigirListaUsuPostActualiz($mensaje);
        } else {
            echo "Usted no tiene permisos para realizar esta operacion";
        }
    }

    function mostrarUsuariosPaginado($pagina = null, $mensaje = null, $exito = null)
    {
        // chequeo que sea administrador para poder consultar el listado
        $this->sesionHelper->esta_logueadoAdministrador();
        //1) obtener número total de habitaciones para paginar
        $total_registros = $this->model->obtenerCantUsuarios();

        //constante
        $itemsPagina = 5;
        //averiguar según número de página
        $inicio = 0;
        //calculo el total de paginas
        $tot_paginas = intval($total_registros / $itemsPagina);
        $resto = $total_registros % $itemsPagina;
        //si hay resto, sumo 1 a cantidad de páginas
        if ($resto > 0) {
            $tot_paginas++;
        }
        if ($total_registros > 0) {
            if ((!$pagina) || ($pagina > $tot_paginas)) {
                $inicio = 0;
                $pagina = 1;
            } else {
                $inicio = ($pagina - 1) * $itemsPagina;
            }

            $usuarios = $this->model->obtenerUsuariosPaginado($inicio, $itemsPagina);
            for ($i = 1; $i<= $tot_paginas; $i++)
            {
                $arregloPag[$i-1] = $i;
            }
            if (isset($usuarios)) {
                $this->view->mostrarUsuariosPag($usuarios, $pagina, $arregloPag, $mensaje, $exito);
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
        // si el usuario y la contraseña ingresado con correctos y esta habilitado el usuario
        if (!empty($usuario) && password_verify($passIngresado, $usuario->password) && ($usuario->habilitado == 1))
        {
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
            // chequeo que el usuario no se pudo loguear por que no estaba habilitado
            if (($usuario->habilitado != 1)) {
                $this->view->login("El usuario esta inhabilitado. Comuniquese con el adminitrador del siteo.");
            }else{
                $this->view->login("Credenciales inválidas");
            }
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
                    // busco los datos del usuario recientemente insertado
                    $user = $this->model->obtenerUsuario($id);
                    // le creo la session para el autologin
                    $this->sesionHelper->login($user);
                    // si se registro correctamente le muestro la home del usuario visitante
                    header("Location: " . BASE_URL . 'home');
                } else {
                    // si no se registra en la base de datos
                    $this->view->registrar("Ups!! Ocurrió un error vuelva a intentarlo.");
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
            if ($id) {
                // si se registro el cambio correctamente lo direcciono al login
                $this->view->login('El cambio se registró correctamente. Ingrese con su nuevo password');
            } else {
                // si no se registro el cambio lo notifico
                $this->view->actualizarPass("Ups! Ocurrió un error intente mas tarde.");
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
        $pagina = 1 ;
        // verifico que el usuario esté logueado siempre
        $this->sesionHelper->esta_logueadoAdministrador();
        if (is_numeric($id)) {
            $idU = $this->model->eliminarUsuarioMdl($id);
            if ($idU > 0) {
                //echo "entro por aca eliminando bien el usuario";
                $mensaje = "El usuario fue eliminado correctamente";
                $exito = true;
            } else {
                //echo "entro por error";
                $mensaje = "Ups!! Ocurrió un error vuelva a intentar";
            }
            
            $this->mostrarUsuariosPaginado($pagina, $mensaje, $exito);
        } else {
            // si no viene un numero por parametro
            $camino = 'listar_usuarios';
            $this->errorHelper->pantallaDeError($camino);
        }
    }

    /**
     * Edita un usuario registrado
     */
    function editarUsuario($id)
    {
        /* verifico que el usuario sea administrador para poder realizar operacion */
        $this->sesionHelper->esta_logueadoAdministrador();
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
            $this->errorHelper->pantallaDeError($camino);
        } 
    }
    
    /**
     * Actualiza los datos cambiados de un usuario registrado
     */
    function guardarUsuario()
    {
        $pagina = 1 ;    
        $this->sesionHelper->esta_logueadoAdministrador();
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
        $this->mostrarUsuariosPaginado($pagina, $mensaje, $exito);
        
    }


}
