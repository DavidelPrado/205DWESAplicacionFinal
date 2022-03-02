<?php
    /**
    * @author: David del Prado Losada
    * @since: 01/03/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de mantenimiento de usuarios
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>