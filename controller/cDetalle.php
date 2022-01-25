<?php
    /**
    * @author: David del Prado Losada
    * @since: 12/01/2022
    * @version: v1.0
    * 
    * Controlador de la ventana detalle
    */
    
    if(isset($_REQUEST['volver'])){ 
        $_SESSION['paginaAnterior'] = 'detalle';
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>