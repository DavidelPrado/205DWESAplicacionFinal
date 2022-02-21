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
                WHERE T02_CodDepartamento='{$codDepartamento}';
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
        
        public static function altaDepartamento($codDepartamento, $descripcion, $volumen){
            $oDateTime = new DateTime();
            
            $consulta=<<<SQL
                INSERT INTO T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio) 
                VALUES ('{$codDepartamento}', '{$descripcion}', '{$oDateTime->format("y-m-d h:i:s")}', '{$volumen}');
            SQL;
            
            if(DBPDO::ejecutarConsulta($consulta)){
                return new Departamento($codDepartamento, $descripcion, $oDateTime->format("y-m-d h:i:s"), $volumen);
            }else{
                return false;
            }
        }
        
        /**
        * Busca un departamento utilizando el codigo y lo elimina
        * 
        * Obtiene el código de un departamento y lo elimina
        * 
        * @param String $codDepartamento Codigo del departamento que queremos eliminar
        */
        public static function bajafisicaDepartamento($codDepartamento){
            $consulta="DELETE FROM T02_Departamento WHERE T02_CodDepartamento='{$codDepartamento}'";
            
            $oResultado=DBPDO::ejecutarConsulta($consulta);

            return $oResultado;
        }
        
        public static function bajaLogicaDepartamento(){
            
        }
        
        public static function modificarDepartamento($oDepartamento, $descDepartamento, $volumenDeNegocio){
            $consulta=<<<PDO
                UPDATE T02_Departamento SET T02_DescDepartamento='{$descDepartamento}' 
                AND T02_VolumenDeNegocio='{$volumenDeNegocio}'
                WHERE T02_CodDepartamento='{$oDepartamento->getCodDepartamento()}'"
            PDO;
            
            $oDepartamento->setDescDepartamento($descDepartamento);
            $oDepartamento->setVolumenDeNegocio($volumenDeNegocio);
            
            if(DBPDO::ejecutarConsulta($consulta)){
                return $oDepartamento;
            }else{
                return false;
            }


        }
        
        public static function rehabilitaDepartamento(){
            
        }
        
        public static function validaCodNoExiste($codDepartamento){
            $consulta="SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento='{$codDepartamento}'";
            
            $oResultado=DBPDO::ejecutarConsulta($consulta);
            
            return $oResultado->fetchObject();
        }
    }
?>
