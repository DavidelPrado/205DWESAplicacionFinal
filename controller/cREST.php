<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Controlador de la vista REST
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }

    //$oJSON=file_get_contents('https://api.dictionaryapi.dev/api/v2/entries/es/calabaza');
    
    //$aMostrar=json_decode($oJSON);
    
    include $aVistas['layout'];
?>