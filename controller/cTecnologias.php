<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Controlador de la vista WIP
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>