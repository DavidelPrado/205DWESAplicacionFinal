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
        include $aControladores['inicioPublico'];
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
    
    if(isset($_REQUEST['crear'])){
        //Inicializar variable que controlara si los campos estan correctos
        $entradaOK=true;
        
        $aErrores["usuario"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["usuario"], 8, MIN_TAMANIO, OBLIGATORIO);
        $aErrores["password"]=validacionFormularios::validarPassword($_REQUEST["password"], 8, MIN_TAMANIO, 1, OBLIGATORIO);
        $aErrores["repetirPassword"]=validacionFormularios::validarPassword($_REQUEST["repetirPassword"], 8, MIN_TAMANIO, 1, OBLIGATORIO);
        $aErrores["descripcion"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descripcion"], 255, MIN_TAMANIO, OBLIGATORIO);

        if($aErrores["usuario"]==null && $aErrores["password"]==null && $aErrores["repetirPassword"]==null && $aErrores["descripcion"]==null){
            $oUsuario=UsuarioPDO::validarCodNoExiste($_REQUEST["usuario"]);
            if($oUsuario){
                $aErrores["usuario"]="El usuario ya existe";
                $entradaOK = false;
            }
            
            if($_REQUEST['password']!=$_REQUEST['repetirPassword']){ 
                $aErrores['repetirPassword']="Las contraseñas no coinciden.";
                $entradaOK = false;
            }
        }else{
            $entradaOK=false;
        }
    }else{
        $entradaOK = false;
    }
    
    if($entradaOK){
        $oUsuario=UsuarioPDO::altaUsuario($_REQUEST["usuario"], $_REQUEST["password"], $_REQUEST["descripcion"]);
        $_SESSION['usuarioDAW205AplicacionFinal'] = $oUsuario;

        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>
