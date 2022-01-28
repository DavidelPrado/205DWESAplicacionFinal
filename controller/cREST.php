<?php
    /*
    * @author: David del Prado Losada
    * @since: 24/01/2022
    * @version: v1.0
    * 
    * Controlador de la vista REST
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }

    $aMostrar=REST::usuarioAleatorio();
    
    include $aVistas['layout'];
?>