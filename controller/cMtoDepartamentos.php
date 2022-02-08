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
    
    //Definir array para almacenar errores
    $aErrores=[
        "codigo"=>null,
    ];
    
    if(isset($_REQUEST['enviar'])){
        $entradaOK=true;
        //Comprobar si los campos son correctos
        $aErrores["codigo"]=validacionFormularios::comprobarAlfaNumerico($_REQUEST["codigo"], 255, MIN_TAMANIO, OPCIONAL); 

        
    }else{
        $entradaOK=false;
    }

    include $aVistas['layout'];
?>