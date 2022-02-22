<?php
    /**
    * @author: David del Prado Losada
    * @since: 08/02/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de mantenimiento de departamentos
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['eliminar'])){
        $_SESSION["codDepartamento"]=$_REQUEST["eliminar"];

        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'eliminar';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['modificar'])){
        $_SESSION["codDepartamento"]=$_REQUEST["modificar"];

        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'WIP';
        header('location: ./index.php');
        exit;
    }

    if(isset($_REQUEST['alta'])){
        $_SESSION["codDepartamento"]=$_REQUEST["alta"];

        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'alta';
        header('location: ./index.php');
        exit;
    }

    //Definir array para almacenar errores
    $aErrores=[
        "descripcion"=>null,
        "criterioBusqueda"=>null
    ];
    
    $entradaOK=true;
    
    if(isset($_REQUEST['enviar'])){
        //Comprobar si los campos son correctos
        $aErrores["descripcion"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descripcion"], 255, 1, OPCIONAL);
        $aErrores["criterioBusqueda"]=validacionFormularios::validarElementoEnLista($_REQUEST["criterioBusqueda"], ["todos", "alta", "baja"]);
        
        if($aErrores["descripcion"]!=null && $aErrores["criterioBusqueda"]){
            $entradaOK=false;
        }
    }else{
        $entradaOK=false;
    }
    
    $aVDepartamentos=[];
    $oDepartamentos=DepartamentoPDO::buscaDepartamentoPorDesc($_REQUEST["descripcion"]??"", $_REQUEST["criterioBusqueda"]??"todos");

    if($oDepartamentos){
        foreach($oDepartamentos as $departamento){
            array_push($aVDepartamentos, [
                "CodDepartamento"=>$departamento->getCodDepartamento(),
                "DescDepartamento"=>$departamento->getDescDepartamento(),
                "FechaCreacionDepartamento"=>$departamento->getFechaCreacionDepartamento(),
                "VolumenDeNegocio"=>$departamento->getVolumenDeNegocio(),
                "FechaBajaDepartamento"=>$departamento->getFechaBajaDepartamento()
            ]);
        }
    }else{
        $aErrores["descripcion"]="No se ha encontrado el departamento";
    }
    include $aVistas['layout'];
?>