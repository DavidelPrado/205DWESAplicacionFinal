<?php
    /**
    * @author: David del Prado Losada
    * @since: 08/02/2022
    * @version: v1.0
    * 
    * Controlador de la ventana de edicion de usuario
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'editar';
        header('location: ./index.php');
        exit;
    }
    
    //Definir array para almacenar errores
    $aErrores=[
        "password"=>null,
        "passwordNueva"=>null,
        "repetirPasswordNueva"=>null
    ];
    
    if(isset($_REQUEST['aceptar'])){
        //Inicializar variable que controlara si los campos estan correctos
        $entradaOK=true;
        
        $aErrores["password"]=validacionFormularios::validarPassword($_REQUEST["password"], 8, MIN_TAMANIO, 1, OBLIGATORIO);
        $aErrores["passwordNueva"]=validacionFormularios::validarPassword($_REQUEST["passwordNueva"], 8, MIN_TAMANIO, 1, OBLIGATORIO);
        $aErrores["repetirPasswordNueva"]=validacionFormularios::validarPassword($_REQUEST["repetirPasswordNueva"], 8, MIN_TAMANIO, 1, OBLIGATORIO);

        if($aErrores["password"]==null && $aErrores["passwordNueva"]==null && $aErrores["repetirPasswordNueva"]==null){
            if(UsuarioPDO::validarUsuario($_SESSION['usuarioDAW205AplicacionFinal']->getCodUsuario(), $_REQUEST['password'])){
                if($_REQUEST["passwordNueva"]==$_REQUEST["repetirPasswordNueva"]){
                    $oUsuario=UsuarioPDO::cambiarPassword($_SESSION["usuarioDAW205AplicacionFinal"], $_REQUEST["passwordNueva"]);

                    if(!$oUsuario){
                        $entradaOK = false;
                    }
                }else{
                    $aErrores["passwordNueva"]="La contraseña no coincide";
                    $entradaOK=false;
                }
            }else{
                $aErrores['password']="Contraseña incorrecta";
                $entradaOK = false;
            }
            
        }else{
            $entradaOK=false;
        }
    }else{
        $entradaOK = false;
    }
    
    
    if($entradaOK){
        $_SESSION['usuarioDAW205AplicacionFinal'] = $oUsuario;

        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'editar';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>