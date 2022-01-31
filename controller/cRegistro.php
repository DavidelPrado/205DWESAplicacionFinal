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
    
    //Definir array para almacenar errores
    $aErrores=[
        "usuario"=>null,
        "password"=>null,
        "repetirPassword"=>null,
        "descripcion"=>null
    ];
    
    //Inicializar variable que controlara si los campos estan correctos
    $entradaOK=true;
    
    if(isset($_REQUEST['crear'])){
        $aErrores["usuario"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["usuario"], 8, MIN_TAMANIO, OBLIGATORIO);
        $aErrores["password"]=validacionFormularios::validarPassword($_REQUEST["password"], 8, MIN_TAMANIO, 1, OBLIGATORIO);
        $aErrores["descripcion"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descripcion"], 255, MIN_TAMANIO, OBLIGATORIO);

        if($aErrores["usuario"]==null && $aErrores["password"]==null && $aErrores["descripcion"]==null){
            $oUsuario=UsuarioPDO::validarCodNoExiste($_REQUEST["usuario"]);
            if($oUsuario){
                $aErrores["usuario"]="El usuario ya existe";
                $entradaOK = false;
            }
        }
    }else{
        $entradaOK = false;
    }
    
    if($entradaOK){
        $oUsuario=UsuarioPDO::altaUsuario($_REQUEST["usuario"], $_REQUEST["password"], $_REQUEST["descripcion"]);
        $_SESSION['usuarioDAW205AppLoginLogout'] = $oUsuario;

        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>