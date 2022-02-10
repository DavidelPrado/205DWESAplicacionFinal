<?php
    /**
    * @author: David del Prado Losada
    * @since: 10/02/2022
    * @version: v1.0
    * 
    * Api de busqueda de departamentos por codigo
    * 
    * http://daw205.sauces.local/205DWESAplicacionFinal/api/BuscarDepPorCodigo.php?codDepartamento=INF
    */
    
    //Incluir los modelos utilizados en la api
    include '../config/confDB.php';
    include '../model/DB.php';
    include '../model/DBPDO.php';
    include '../model/AppError.php';
    include '../model/REST.php';
    include '../model/Departamento.php';
    include '../model/DepartamentoPDO.php';
    
    $aErrores=[
        "codDepartamento"=>null
    ];
    
    if(isset($_GET['codDepartamento'])){
        
        $oDepartamento=DepartamentoPDO::buscaDepartamentoPorCod($_GET['codDepartamento']);
        
        if($oDepartamento!=null){
            $aDepartamento=[
                "codDepartamento"=>$oDepartamento->getCodDepartamento(),
                "descDepartamento"=>$oDepartamento->getDescDepartamento(),
                "fechaCreacionDepartamento"=>$oDepartamento->getFechaCreacionDepartamento(),
                "volumenDeNegocio"=>$oDepartamento->getVolumenDeNegocio(),
                "fechaBajaDepartamento"=>$oDepartamento->getFechaBajaDepartamento()
            ];
        }else{
            $aErrores["codDepartamento"]="No se ha encontrado el departamento";
        }
    }else{
        $aErrores["codDepartamento"]="No has introducido ningun departamento";
    }
    
    if($aErrores["codDepartamento"]==null){
        echo json_encode($aDepartamento);
    }else{
        echo $aErrores["codDepartamento"];
    }
?>