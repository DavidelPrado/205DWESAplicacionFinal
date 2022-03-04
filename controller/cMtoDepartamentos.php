<?php
    /**
    * @author: David del Prado Losada
    * @since: 08/02/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de mantenimiento de departamentos
    */
    
    if(!isset($_SESSION["criterioBusquedaDepartamentos"]["descripcionBuscada"])){
        $_SESSION["criterioBusquedaDepartamentos"]["descripcionBuscada"]="";
    }
    
    if(!isset($_SESSION["criterioBusquedaDepartamentos"]["estado"])){
        $_SESSION["criterioBusquedaDepartamentos"]["estado"]="todos";
    }

    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'inicio';
        
        unset($_SESSION['criterioBusquedaDepartamentos']);
        unset($_SESSION['codDepartamento']);
        unset($_SESSION['numPagina']);
        unset($_SESSION['totalPaginas']);
        
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
        $_SESSION['paginaEnCurso'] = 'modificar';
        header('location: ./index.php');
        exit;
    }

    if(isset($_REQUEST['altaDep'])){
        $_SESSION["codDepartamento"]=$_REQUEST["altaDep"];

        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'alta';
        header('location: ./index.php');
        exit;
    }

    //Paginacion
    if(isset($_REQUEST['primera'])){
        $_SESSION['numPagina']=1;

        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['anterior']) && $_SESSION['numPagina']>=2){
        $_SESSION['numPagina']--;

        header('Location: index.php');
        exit;
    }

    if(isset($_REQUEST['siguiente'])){
        if($_SESSION["numPagina"]==$_SESSION["totalPaginas"] || $_SESSION["totalPaginas"]==0){
            
        }else{
            $_SESSION['numPagina']++;
        }

        header('Location: index.php');
        exit;
    }

    if(isset($_REQUEST['ultima'])){
        if($_SESSION["totalPaginas"]!=0){
            $_SESSION["numPagina"]=$_SESSION["totalPaginas"];
        }
        

        header('Location: index.php');
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
        
        if($aErrores["descripcion"]!=null && $aErrores["criterioBusqueda"]!=null){
            $entradaOK=false;
        }else{
            $_SESSION["criterioBusquedaDepartamentos"]["descripcionBuscada"]=$_REQUEST["descripcion"];
            $_SESSION["criterioBusquedaDepartamentos"]["estado"]=$_REQUEST["criterioBusqueda"];
        }
    }else{
        $entradaOK=false;
    }
    
    if(!isset($_SESSION["numPagina"])){
        $_SESSION["numPagina"]=1;
    }

    $_SESSION["totalPaginas"]=ceil(DepartamentoPDO::contarDepartamentosTotales($_SESSION["criterioBusquedaDepartamentos"]["descripcionBuscada"]??"", $_SESSION["criterioBusquedaDepartamentos"]["estado"]??"todos")/3);


    $aVDepartamentos=[];
    $oDepartamentos=DepartamentoPDO::buscaDepartamentoPorDesc($_SESSION["criterioBusquedaDepartamentos"]["descripcionBuscada"]??"", $_SESSION["criterioBusquedaDepartamentos"]["estado"]??"todos", $_SESSION["numPagina"]);

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