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
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['cambiar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'cambiar';
        header('location: ./index.php');
        exit;
    }
    
    if(isset($_REQUEST['borrar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'borrar';
        header('location: ./index.php');
        exit;
    }
    
    //Variables para rellenar el formulario
    $usuario=$_SESSION["usuarioDAW205AplicacionFinal"]->getCodUsuario();
    $descripcion=$_SESSION["usuarioDAW205AplicacionFinal"]->getDescUsuario();
    $password=$_SESSION["usuarioDAW205AplicacionFinal"]->getPassword();
    $nConexiones=$_SESSION["usuarioDAW205AplicacionFinal"]->getNumConexiones();
    $fecha=$_SESSION["usuarioDAW205AplicacionFinal"]->getFechaHoraUltimaConexion();

    //Definir array para almacenar errores
    $aErrores=[
        "descripcion"=>null
    ];
    
    if(isset($_REQUEST['aceptar'])){
        //Inicializar variable que controlara si los campos estan correctos
        $entradaOK=true;
        
        $aErrores["descripcion"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["descripcion"], 255, MIN_TAMANIO, OBLIGATORIO);

        if($aErrores["descripcion"]==null){
            $oUsuario=UsuarioPDO::modificarUsuario($_SESSION["usuarioDAW205AplicacionFinal"], $_REQUEST["descripcion"]);

            if(!$oUsuario){
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
        $_SESSION['paginaEnCurso'] = 'inicio';
        header('location: ./index.php');
        exit;
    }

    include $aVistas['layout'];
?>