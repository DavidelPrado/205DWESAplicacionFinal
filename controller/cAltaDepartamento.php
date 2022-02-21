<?php
    /**
    * @author: David del Prado Losada
    * @since: 19/02/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de alta de departamentos
    */
    
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'mantenimiento';
        header('location: ./index.php');
        exit;
    }
    
    $aErrores=[
        'codDepartamento'=>null,
        'descripcion'=>null,
        'volumen'=>null
    ];

    if(isset($_REQUEST['crear'])){
        //Inicializar variable que controlara si los campos estan correctos
        $entradaOK=true;
        
        $aErrores["codDepartamento"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["codDepartamento"], 3, 3, OBLIGATORIO);
        $aErrores["descripcion"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descripcion"], 255, MIN_TAMANIO, OBLIGATORIO);
        $aErrores["volumen"]=validacionFormularios::comprobarEntero($_REQUEST["volumen"], 10000, 0, OBLIGATORIO);

        if($aErrores["codDepartamento"]==null && $aErrores["descripcion"]==null && $aErrores["volumen"]==null){
            $oUsuario=UsuarioPDO::validarCodNoExiste($_REQUEST["codDepartamento"]);
            if($oUsuario){
                $aErrores["codDepartamento"]="El departamento ya existe";
                $entradaOK = false;
            }
        }else{
            $entradaOK=false;
        }
    }else{
        $entradaOK = false;
    }
    
    if($entradaOK){
        $oUsuario=DepartamentoPDO::altaDepartamento($_REQUEST["codDepartamento"], $_REQUEST["descripcion"], $_REQUEST["volumen"]);

        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'mantenimiento';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>