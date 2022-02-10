<?php
    /**
    * @author: David del Prado Losada
    * @since: 09/02/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de borrado de cuenta
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'editar';
        header('location: ./index.php');
        exit;
    }
    
    //Variables para rellenar el formulario
    $usuario=$_SESSION["usuarioDAW205AplicacionFinal"]->getCodUsuario();
    $descripcion=$_SESSION["usuarioDAW205AplicacionFinal"]->getDescUsuario();
    $password=$_SESSION["usuarioDAW205AplicacionFinal"]->getPassword();
    $nConexiones=$_SESSION["usuarioDAW205AplicacionFinal"]->getNumConexiones();
    $fecha=$_SESSION["usuarioDAW205AplicacionFinal"]->getFechaHoraUltimaConexion();

    if(isset($_REQUEST['aceptar'])){
        UsuarioPDO::borrarUsuario($usuario);

        //Destruir la sesion
        session_destroy();

        $_SESSION['paginaEnCurso'] = 'inicioPublico';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>