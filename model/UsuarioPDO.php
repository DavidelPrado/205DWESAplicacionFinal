<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Clase para el manejo de usuarios en la base de datos
    */

    class UsuarioPDO implements UsuarioDB{
        public static function validarUsuario($codUsuario, $password){
            $consulta = <<<PDO
                SELECT * FROM T01_Usuario
                WHERE T01_CodUsuario='{$codUsuario}' AND
                T01_Password=SHA2("{$codUsuario}{$password}", 256);
            PDO;
            
            $oResultado = DBPDO::ejecutarConsulta($consulta);
            $oUsuario=$oResultado->fetchObject();
            
            if($oUsuario){
                return new Usuario($oUsuario->T01_CodUsuario, $oUsuario->T01_Password, $oUsuario->T01_DescUsuario, $oUsuario->T01_NumConexiones, $oUsuario->T01_FechaHoraUltimaConexion, null, $oUsuario->T01_Perfil);
            }else{
                return false;
            }
        }
        
        public static function registrarUltimaConexion($oUsuario){
            //Guardo la hora actual
            $oDateTime = new DateTime();
            
            $oUsuario->setFechaHoraUltimaConexionAnterior($oUsuario->getFechaHoraUltimaConexion());
            $oUsuario->setFechaHoraUltimaConexion($oDateTime->format("y-m-d h:i:s"));
            $oUsuario->setNumConexiones($oUsuario->getNumConexiones()+1);
            
            $consulta = <<<PDO
                UPDATE T01_Usuario SET T01_NumConexiones= '{$oUsuario->getNumConexiones()}',
                T01_FechaHoraUltimaConexion = '{$oUsuario->getFechaHoraUltimaConexion()}'
                WHERE T01_CodUsuario='{$oUsuario->getCodUsuario()}';
            PDO;

            DBPDO::ejecutarConsulta($consulta);
            
            return $oUsuario;
        }
        
        public static function altaUsuario($codUsuario, $password, $descripcion){
            $consulta=<<<SQL
                INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario) 
                VALUES ('{$codUsuario}', SHA2('{$codUsuario}{$password}', 256), '{$descripcion}');
            SQL;
                
            $oResultado=DBPDO::ejecutarConsulta($consulta);
            $oUsuario=$oResultado->fetchObject();
            
            if($oUsuario){
                return new Usuario($_REQUEST["usuario"], $_REQUEST["password"], $_REQUEST["descripcion"], 1, time(), null, $oUsuario->T01_Perfil);
            }else{
                return false;
            }
            
            
        }
        
        public static function validarCodNoExiste($codUsuario){
            $consulta="SELECT * FROM T01_Usuario WHERE T01_CodUsuario='{$codUsuario}'";
            
            $oResultado=DBPDO::ejecutarConsulta($consulta);
            
            return $oResultado->fetchObject();
        }
        
        
        public static function modificarUsuario(){
            
        }
        
        public static function borrarUsuario(){
            
        }
        
        
    }
?>