<?php
    /**
    * Clase para el manejo de departamentos en la base de datos
    * 
    * 
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    */

    class DepartamentoPDO{
        /**
        * Busca un departamento utilizando un codigo
        * 
        * Obtiene el codigo de un departamento y lo busca en la base de datos, si existe lo devuelve como un objeto
        * 
        * @param String $codDepartamento Codigo que queremos buscar en la base de datos
        */
        public static function buscaDepartamentoPorCod($codDepartamento){
            $consulta = <<<PDO
                SELECT * FROM T02_Departamento
                WHERE T02_CodDepartamento='%{$codDepartamento}%';
            PDO;
            
            $oResultado = DBPDO::ejecutarConsulta($consulta);
            $oDepartamento=$oResultado->fetchObject();
            
            if($oDepartamento){
                return new Departamento(
                    $oDepartamento->T02_CodDepartamento, 
                    $oDepartamento->T02_DescDepartamento, 
                    $oDepartamento->T02_FechaCreacionDepartamento, 
                    $oDepartamento->T02_VolumenDeNegocio, 
                    $oDepartamento->T02_FechaBajaDepartamento
                );
            }else{
                return false;
            }
        }
        
        /**
        * Busca un departamento utilizando la descripción
        * 
        * Obtiene la descripcion de un departamento y la busca en la base de datos, si existe lo devuelve como un objeto
        * 
        * @param String $descDepartamento Descripcion que queremos buscar en la base de datos
        */
        public static function buscaDepartamentoPorDesc($descDepartamento=""){
            $consulta = <<<PDO
                SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%{$descDepartamento}%';
            PDO;
                
            $oResultado = DBPDO::ejecutarConsulta($consulta);
            $aDepartamentos=$oResultado->fetchAll();
            if($aDepartamentos){
                $aResultado=[];
            
                foreach($aDepartamentos as $oDepartamento){
                    $aResultado[$oDepartamento["T02_CodDepartamento"]]=new Departamento(
                        $oDepartamento["T02_CodDepartamento"], 
                        $oDepartamento["T02_DescDepartamento"], 
                        $oDepartamento["T02_FechaCreacionDepartamento"], 
                        $oDepartamento["T02_VolumenDeNegocio"], 
                        $oDepartamento["T02_FechaBajaDepartamento"]
                    );
                }
                return $aResultado;
            }else{
                return false;
            }   
        }
        
        public static function altaDepartamento(){
            
        }
        
        public static function bajafisicaDepartamento(){
            
        }
        
        public static function bajaLogicaDepartamento(){
            
        }
        
        public static function modificaDepartamento(){
            
        }
        
        public static function rehabilitaDepartamento(){
            
        }
        
        public static function validaCodNoExiste(){
            
        }
    }
?>
