<?php
    /*
    * @author: David del Prado Losada
    * @since: 28/01/2022
    * @version: v1.0
    * 
    * Controlador de la vista de registro
    */

    if(isset($_REQUEST['cancelar'])){
        session_destroy();
        include $aControladores['inicioPublica'];
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['crear'])){
        $aErrores["usuario"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["usuario"], 8, MIN_TAMANIO, OBLIGATORIO);
        $aErrores["password"]=validacionFormularios::validarPassword($_REQUEST["password"], 8, MIN_TAMANIO, 1, OBLIGATORIO);
        $aErrores["repetirPassword"]=validacionFormularios::validarPassword($_REQUEST["repetirPassword"], 8, MIN_TAMANIO, 1, OBLIGATORIO);
        $aErrores["descripcion"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descripcion"], 255, MIN_TAMANIO, OBLIGATORIO);

        if($aErrores["usuario"]==null && $aErrores["password"]==null && $aErrores["repetirPassword"]==null && $aErrores["descripcion"]==null){
            $oUsuario=UsuarioPDO::altaUsuario($_REQUEST['usuario'], $_REQUEST['password'], $_REQUEST['repetirPassword'], $_REQUEST['descripcion']);
        
            if(!$oUsuario){
                $entradaOK=false;
            }
            $entradaOK=true;
        }
    }else{
        //El formulario no se ha rellenado nunca
        $entradaOK = false;
    }
    
    if($entradaOK){
        
    }

    include $aVistas['layout'];
?>