<?php
    /**
    * @author: David del Prado Losada
    * @since: 21/02/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de modificación de departamentos
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

    //Definir array para almacenar errores
    $aErrores=[
        "descripcion"=>null,
        "volumen"=>null
    ];
    
    if(isset($_REQUEST['aceptar'])){
        //Inicializar variable que controlara si los campos estan correctos
        $entradaOK=true;
        
        $aErrores["descripcion"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descripcion"], 255, MIN_TAMANIO, OBLIGATORIO);
        $aErrores["volumen"]=validacionFormularios::comprobarEntero($_REQUEST["volumen"], 10000, 0, OBLIGATORIO);

        if($aErrores["descripcion"]==null && $aErrores["volumen"]==null){
            $departamento=DepartamentoPDO::modificarDepartamento($oDepartamento->getCodDepartamento(), $_REQUEST["descripcion"], $_REQUEST["volumen"]);
        
            if($departamento==null){
                $entradaOK=false;
            }
        }else{
            $entradaOK=false;
        }
    }else{
        $entradaOK = false;
    }
    
    
    if($entradaOK){
        
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'mantenimiento';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>