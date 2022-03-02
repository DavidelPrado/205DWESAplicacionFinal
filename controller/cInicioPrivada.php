<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Controlador de la vista de inicio privada
    */

    if(!isset($_SESSION['usuarioDAW205AplicacionFinal'])){
        $_SESSION['paginaEnCurso'] = $aControladores['login'];
        header('location: ./index.php');
        exit;
    }

    if(isset($_REQUEST['logout'])){
        session_unset();
        session_destroy();

        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['detalle'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'detalle';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['mtoDep'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'mantenimiento';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['mtoUsuarios'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'mantenimientoUsuarios';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['rest'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'rest';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['editar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'editar';
        header('location: ./index.php');
        exit;
    }

    //Obtener datos para mostrar en el mensaje de bienvenida y guardarlos en el array aVInicio
    $consulta = <<<QUERY
        SELECT T01_DescUsuario, T01_NumConexiones FROM T01_Usuario
        WHERE T01_CodUsuario='{$_SESSION['usuarioDAW205AplicacionFinal']->getCodUsuario()}';
    QUERY;
    $oResultado = DBPDO::ejecutarConsulta($consulta)->fetchObject();

    $aVInicio = [
        'descUsuario' => $oResultado->T01_DescUsuario,
        'numConexiones' => $oResultado->T01_NumConexiones 
    ];
    
    include $aVistas['layout'];
?>