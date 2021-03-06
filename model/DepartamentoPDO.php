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
        * @param String $descDepartamento Descripción que queremos buscar en la base de datos
        */
        public static function buscaDepartamentoPorDesc($descDepartamento="", $criterioBusqueda="todos", $pagina=1){
            $pagina=($pagina-1)*3;
            switch($criterioBusqueda){
                case "todos":
                    $criterio="";
                    break;
                case "alta":
                    $criterio="AND T02_FechaBajaDepartamento IS NULL";
                    break;
                case "baja":
                    $criterio="AND T02_FechaBajaDepartamento IS NOT NULL";
                    break;
            }
            
            $consulta = <<<PDO
                SELECT * FROM T02_Departamento WHERE T02_DescDepartamento 
                LIKE '%{$descDepartamento}%'{$criterio}
                LIMIT 3 OFFSET {$pagina};
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
        
        /**
        * Cuenta cuantos departamentos hay en la base de datos
        * 
        * Busca cuantos departamentos hay en la base de datos utilizando el criterio de busqueda
        * 
        * @param String $criterioBusqueda Criterio segun el que vamos a buscar lso departamentos, ya sea todos, los que estan dados de baja o los que estan dados de alta
        */
        public static function contarDepartamentosTotales($descDepartamento="", $criterioBusqueda="todos"){
            switch($criterioBusqueda){
                case "todos":
                    $criterio="";
                    break;
                case "alta":
                    $criterio="AND T02_FechaBajaDepartamento IS NULL";
                    break;
                case "baja":
                    $criterio="AND T02_FechaBajaDepartamento IS NOT NULL";
                    break;
            }

            $consulta = <<<PDO
                SELECT * FROM T02_Departamento WHERE T02_DescDepartamento 
                LIKE '%{$descDepartamento}%' {$criterio};
            PDO;

            $oResultado=DBPDO::ejecutarConsulta($consulta);
        
            return $oResultado->rowCount();
        }


        /**
        * Da de alta un departamento
        * 
        * Da de alta un departamento utilizando codigo, descripcion y volumen.
        * 
        * @param String $codDepartamento Codigo identificador del departamento
        * @param String $descDepartamento Descripcion del departamento
        * @param Int $volumenDeNegocio Volumen de negocio del departamento
        */
        public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio){
            $oDateTime = new DateTime();
            
            $consulta=<<<SQL
                INSERT INTO T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio) 
                VALUES ('{$codDepartamento}', '{$descDepartamento}', '{$oDateTime->format("y-m-d h:i:s")}', '{$volumenDeNegocio}');
            SQL;
            
            if(DBPDO::ejecutarConsulta($consulta)){
                return new Departamento($codDepartamento, $descDepartamento, $oDateTime->format("y-m-d h:i:s"), $volumenDeNegocio);
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
        public static function bajaFisicaDepartamento($codDepartamento){
            $consulta="DELETE FROM T02_Departamento WHERE T02_CodDepartamento='{$codDepartamento}'";
            
            $oResultado=DBPDO::ejecutarConsulta($consulta);

            return $oResultado;
        }
        
        /**
        * Busca un departamento utilizando el codigo y le añade una fecha de baja
        * 
        * Obtiene el código de un departamento y le añade una fecha de baja
        * 
        * @param String $codDepartamento Codigo del departamento que queremos eliminar
        */
        public static function bajaLogicaDepartamento($codDepartamento){
            $oDateTime = new DateTime();
            
            $consulta=<<<SQL
                UPDATE T02_Departamento SET T02_FechaBajaDepartamento='{$oDateTime->format("y-m-d h:i:s")}' 
                WHERE T02_CodDepartamento='{$codDepartamento}';
            SQL;
                
            return DBPDO::ejecutarConsulta($consulta);
        }
        
        /**
        * Busca un departamento utilizando el codigo y le elimina la fecha de baja
        * 
        * Busca un departamento utilizando el codigo y le elimina la fecha de baja
        * 
        * @param String $codDepartamento Codigo del departamento que queremos eliminar
        */
        public static function rehabilitaDepartamento($codDepartamento){
            $consulta=<<<SQL
                UPDATE T02_Departamento SET T02_FechaBajaDepartamento=null
                WHERE T02_CodDepartamento='{$codDepartamento}';
            SQL;
                
            return DBPDO::ejecutarConsulta($consulta);
        }
        
        /**
        * Modifica un departamento
        * 
        * Modifica la descripcion y volumen de un departamento.
        * 
        * @param String $codDepartamento Codigo identificador del departamento
        * @param String $descDepartamento Descripcion del departamento
        * @param Int $volumenDeNegocio Volumen de negocio del departamento
        */
        public static function modificarDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio){
            $consulta=<<<PDO
                UPDATE T02_Departamento SET T02_DescDepartamento='{$descDepartamento}'
                , T02_VolumenDeNegocio='{$volumenDeNegocio}'
                WHERE T02_CodDepartamento='{$codDepartamento}';
            PDO;
            
            return DBPDO::ejecutarConsulta($consulta);
        }
        
        /**
        * Valida que un codigo de departamento no existe
        * 
        * Obtiene el codigo de un departamento y lo busca en la base de datos, si existe lo devuelve
        * 
        * @param String $codDepartamento Codigo que queremos buscar en la base de datos
        */
        public static function validaCodNoExiste($codDepartamento){
            $consulta="SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento='{$codDepartamento}'";
            
            $oResultado=DBPDO::ejecutarConsulta($consulta);
            
            return $oResultado->fetchObject();
        }
    }
?>
