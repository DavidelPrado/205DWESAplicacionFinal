<?php
    /**
    * @author: David del Prado Losada
    * @since: 08/03/2022
    * @version: v1.0
    * 
    * Api de busqueda de usuarios por descripcion
    * 
    * Desarrollo:
    * 
    * 
    * Explotación:
    * 
    */
    
    //Incluir los modelos utilizados en la api
    include '../config/confDB.php';
    include '../core/210322ValidacionFormularios.php';
    include '../model/DB.php';
    include '../model/DBPDO.php';
    include '../model/AppError.php';
    include '../model/Usuario.php';
    include '../model/UsuarioDB.php';
    include '../model/UsuarioPDO.php';
    
    $aErrores=[
        "descUsuario"=>null
    ];
    
    $entradaOK=true;
    
    if(isset($_GET['descUsuario'])){
        $aErrores["descUsuario"]=validacionFormularios::comprobarAlfabetico($_GET["descUsuario"], 255);
        
        if($aErrores["descUsuario"]!=null){
            $entradaOK=false;
        }
        
    }else{
        $aErrores["descUsuario"]="No has introducido ningun usuario";
        $entradaOK=false;
    }
    
    if($entradaOK){
        $oUsuarios=UsuarioPDO::buscarUsuariosPorDesc($_GET["descUsuario"]);
        $aUsuario["usuarios"]=[];
        
        if($oUsuarios){
            foreach($oUsuarios as $oUsuario){
                array_push($aUsuario["usuarios"], [
                    "codUsuario"=>$oUsuario->getCodUsuario(),
                    "password"=>$oUsuario->getPassword(),
                    "descUsuario"=>$oUsuario->getDescUsuario(),
                    "fechaHoraUltimaConexion"=>$oUsuario->getFechaHoraUltimaConexion(),
                    "numConexiones"=>$oUsuario->getNumConexiones(),
                    "perfil"=>$oUsuario->getPerfil()
                ]);
            }
        }else{
            $aUsuario["usuarios"]["Error"]="No se ha encontrado ningun usuario";
        }
        
        echo json_encode($aUsuario);
    }else{
        echo json_encode($aErrores);
    }
?>