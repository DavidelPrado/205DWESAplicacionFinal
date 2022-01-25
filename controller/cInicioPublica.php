<?php
    /*
    * @author: David del Prado Losada
    * @since: 12/01/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de inicio publica
    */

    if(isset($_REQUEST['iniciar'])){
        $_SESSION['paginaEnCurso'] = 'login';
        header('location: ./index.php');
        exit;
    }
    
    include $aVistas['layout'];
?>