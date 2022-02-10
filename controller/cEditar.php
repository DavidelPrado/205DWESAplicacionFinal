<?php
    /**
    * @author: David del Prado Losada
    * @since: 08/02/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de edicion de usuario
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['cambiar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'cambiar';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['borrar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'borrar';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>