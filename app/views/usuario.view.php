<?php

require_once('libs/smarty/libs/Smarty.class.php');

class UsuarioView
{


    /*  Muestra el formulario de login */

    function login($mensaje)
    {

        $smarty = new Smarty();

        $smarty->assign('mensaje', $mensaje);

        $smarty->display('templates/form.login.tpl');
    }

    /* 
        Muestra el formulario para registrarse como usuario 
    */
    function registrar($mensaje)
    {

        $smarty = new Smarty();

        $smarty->assign('mensaje', $mensaje);

        $smarty->display('templates/form.registro.tpl');
    }

    /* 
        Muestra el formulario para cambiar contraseña 
    */
    function actualizarPass($mensaje)
    {

        $smarty = new Smarty();

        $smarty->assign('mensaje', $mensaje);

        $smarty->display('templates/form.actualizar.pass.tpl');
    }

    /* 
        Muestra todos los usuarios registrados 
    */
    function mostrarUsuariosPag($usuarios, $pagina, $tot_paginas, $mensaje = null, $exito = null)
    {

        $smarty = new Smarty();
       
        $smarty->assign('usuarios', $usuarios);
        //pagina actual activa
        $smarty->assign('pagina_act', $pagina);
        $cant_paginas = sizeof($tot_paginas);
        //Número total de páginas
        $smarty->assign('cant_paginas',$cant_paginas);
        //total de páginas es un arreglo
        $smarty->assign('tot_paginas', $tot_paginas);
        if (isset($exito) && isset($mensaje)) {
            if ($exito == true) {
                $smarty->assign('mensajeBien', $mensaje);
            }
        } else {
            $smarty->assign('mensaje', $mensaje);
        }
        
        $smarty->display('templates/admin.lista.usu.tpl');
    }


    function editarUsuarioVista($usuario)
    {
        $smarty = new Smarty();

        $smarty->assign('usuario', $usuario);

        //Completar opciones de estados de perfil de usuario
        $smarty->assign('txt_habilitado', array('Habilitado', 'Deshabilitado'));
        $smarty->assign('opc_habilitado', array('1', '0'));
        //Completar opciones de tipo de usuario
        $smarty->assign('txt_tipo_usu', array('Administrador', 'Usuario'));
        $smarty->assign('opc_tipo_usu', array('1', '0'));

        $smarty->display('templates/admin.form.edit.usuario.tpl');
    }
}
