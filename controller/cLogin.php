<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Controlador de la vista de login
    */

    if(isset($_REQUEST['cancelar'])){
        session_destroy();
        include $aControladores['inicioPublica'];
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['registro'])){
        $_SESSION['paginaEnCurso']='registro';
        header('location: ./index.php');
        exit;
    }
    
    $entradaOK=true;
    
    if(isset($_REQUEST['login'])){
        $aErrores["usuario"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["usuario"], 255, MIN_TAMANIO, OBLIGATORIO);
        $aErrores["password"]=validacionFormularios::validarPassword($_REQUEST["password"], 8, MIN_TAMANIO, 1, OBLIGATORIO);
        
        //Si no hay errores comprueba que el usuario y la contraseña sean correctos
        if($aErrores["usuario"]==null && $aErrores["password"]==null){
            $oUsuario = UsuarioPDO::validarUsuario($_REQUEST["usuario"], $_REQUEST["password"]);
            if(!$oUsuario){
                $entradaOK=false;
            }
        }else{
            $entradaOK=false;
        }
    }else{
        //El formulario no se ha rellenado nunca
        $entradaOK = false;
    }
    
    if($entradaOK){
        $oUsuario=UsuarioPDO::registrarUltimaConexion($oUsuario);
        $_SESSION['usuarioDAW205AplicacionFinal'] = $oUsuario;

        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>
