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
        public static function buscaDepartamentoPorCod($codDepartamento){
            $consulta = <<<PDO
                SELECT * FROM T02_Departamento
                WHERE T02_CodDepartamento='{$codDepartamento}';
            PDO;
            
            $oResultado = DBPDO::ejecutarConsulta($consulta);
            $oDepartamento=$oResultado->fetchObject();
            
            if($oDepartamento){
                return new Departamento($oDepartamento->T02_CodDepartamento, $oDepartamento->T02_DescDepartamento, $oDepartamento->T02_FechaCreacionDepartamento, $oDepartamento->T02_VolumenDeNegocio, $oDepartamento->T02_FechaBajaDepartamento);
            }else{
                return false;
            }
        }
        
        public static function buscaDepartamentoPorDesc(){
            
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
