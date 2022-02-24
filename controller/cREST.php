<?php
    /*
    * @author: David del Prado Losada
    * @since: 24/01/2022
    * @version: v1.0
    * 
    * Controlador de la vista REST
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['usuario'])){
        $aMostrar=REST::usuarioAleatorio();
    }
    
    //Definir array para almacenar errores
    $aErrores=[
        "palabra"=>null,
        "idioma"=>null,
        "codDepartamento"=>null
    ];
    
    if(isset($_REQUEST['buscar'])){
        $entradaOK=true;
        
        $aErrores["palabra"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["palabra"], 255, MIN_TAMANIO, OBLIGATORIO);
        $aErrores["idioma"]= validacionFormularios::validarElementoEnLista($_REQUEST["idioma"], ["ES", "EN", "FR"]);
        
        if($aErrores["palabra"]!=null && $aErrores["idioma"]!=null){
            $entradaOK=false;
        }
    }else{
        //El formulario no se ha rellenado nunca
        $entradaOK = false;
    }
    
    if($entradaOK){
        $oPalabra=REST::buscarPalabra($_REQUEST["idioma"], $_REQUEST["palabra"]);
        
        $aVPalabra=[
            'palabra' => $oPalabra->palabra,
            'origen' => $oPalabra->origen,
            'significados' => $oPalabra->significados
        ];
    }
    

    //Definir array para almacenar errores
    $aErroresDep=[
        "codDepartamento"=>null
    ];
    
    
    if(isset($_REQUEST['buscarCodDep'])){
        $entradaOKDep=true;
        
        $aErroresDep["codDepartamento"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["codDepartamento"], 3, 3, OBLIGATORIO);
        
        if($aErroresDep["codDepartamento"]!=null){
            $aErroresDep["codDepartamento"]="El codigo no es valido";
            $entradaOKDep=false;
        }
    }else{
        $entradaOKDep = false;
    }
    
    if($entradaOKDep){
        $oDepartamento=REST::buscarDepartamentoPorCodigo($_REQUEST["codDepartamento"]);
        $aDepartamento=[];
        
        if($oDepartamento!=null){
            $aDepartamento=[
                "codDepartamento"=>$oDepartamento->getCodDepartamento(),
                "descDepartamento"=>$oDepartamento->getDescDepartamento(),
                "fechaCreacionDepartamento"=>$oDepartamento->getFechaCreacionDepartamento(),
                "volumenDeNegocio"=>$oDepartamento->getVolumenDeNegocio(),
                "fechaBajaDepartamento"=>$oDepartamento->getFechaBajaDepartamento()
            ];
        }else{
            $aDepartamento=null;
        }
    }
    
    //Definir array para almacenar errores
    $aErroresDepExt=[
        "codDepartamentoExt"=>null
    ];
    
    if(isset($_REQUEST['buscarCodDepExt'])){
        $entradaOKDepExt=true;
        
        $aErroresDepExt["codDepartamentoExt"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["codDepartamentoExt"], 3, 3, OBLIGATORIO);
        
        if($aErroresDepExt["codDepartamentoExt"]!=null){
            $aErroresDepExt["codDepartamentoExt"]="El codigo no es valido";
            $entradaOKDepExt=false;
        }
    }else{
        $entradaOKDepExt = false;
    }
    
    if($entradaOKDepExt){
        $oDepartamento=REST::buscarDepartamentoPorCodigoExterno($_REQUEST["codDepartamentoExt"]);
        $aDepartamentoExt=[];
        
        if($oDepartamento!=null){
            $aDepartamentoExt=[
                "codDepartamento"=>$oDepartamento->getCodDepartamento(),
                "descDepartamento"=>$oDepartamento->getDescDepartamento(),
                "fechaCreacionDepartamento"=>$oDepartamento->getFechaCreacionDepartamento(),
                "volumenDeNegocio"=>$oDepartamento->getVolumenDeNegocio(),
                "fechaBajaDepartamento"=>$oDepartamento->getFechaBajaDepartamento()
            ];
        }else{
            $aDepartamentoExt=null;
        }
    }
    
    include $aVistas['layout'];
?>
