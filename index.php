<?php
    /*
    * @author: David del Prado Losada
    * @since: 24/01/2022
    * @version: v1.0
    * 
    * Controlador de la aplicación
    */
    
    ob_start();
   
    //Constantes de la aplicación.
    include './config/configApp.php';
   
    //Se inicia o recupera la sesión
    session_start();

    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = 'inicioPublica';
    }

    if(isset($_REQUEST['tecnologias'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'tecnologias';
    }

    include $aControladores[$_SESSION['paginaEnCurso']];
 ?>
