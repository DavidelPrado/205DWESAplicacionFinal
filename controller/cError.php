<?php
    /**
    * @author: David del Prado Losada
    * @since: 19/01/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de muestra de errores
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['error']->getPaginaSiguiente();
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>