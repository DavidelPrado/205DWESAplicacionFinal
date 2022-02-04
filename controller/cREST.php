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

    
    if(isset($_REQUEST['buscar'])){
        $entradaOK=true;
        
        //Definir array para almacenar errores
        $aErrores=[
            "palabra"=>null,
            "idioma"=>null
        ];
        
        $aErrores["palabra"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["palabra"], 255, MIN_TAMANIO, OBLIGATORIO);
        $aErrores["idioma"]= validacionFormularios::validarElementoEnLista($_REQUEST["idioma"], ["ES", "EN", "FR"]);
        
        //Si no hay errores comprueba que el usuario y la Password sean correctos
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
    
    
    
    include $aVistas['layout'];
?>