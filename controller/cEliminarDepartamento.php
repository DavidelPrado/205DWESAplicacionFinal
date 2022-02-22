<?php
    /**
    * @author: David del Prado Losada
    * @since: 19/02/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de borrado de departamentos
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'mantenimiento';
        header('location: ./index.php');
        exit;
    }
    
    $oDepartamento=DepartamentoPDO::buscaDepartamentoPorCod($_SESSION["codDepartamento"]);

    if($oDepartamento){
        $aVDepartamento=[
            'codDepartamento'=>$oDepartamento->getCodDepartamento(),
            'descripcion'=>$oDepartamento->getDescDepartamento(),
            'fecha'=>$oDepartamento->getFechaCreacionDepartamento(),
            'volumen'=>$oDepartamento->getVolumenDeNegocio()
        ];
    }

    if(isset($_REQUEST['aceptar'])){
        DepartamentoPDO::bajafisicaDepartamento($_SESSION["codDepartamento"]);

        $_SESSION['paginaEnCurso'] = 'mantenimiento';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>