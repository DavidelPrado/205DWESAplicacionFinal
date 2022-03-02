<?php
    /**
    * Clase para el manejo de usuarios en la base de datos
    * 
    * 
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    */

    class UsuarioPDO implements UsuarioDB{
        /**
        * Comprueba que el usuario no existe en la base de datos
        * 
        * Comprueba si el codigo introduccido coincide con alguno de los existentes en la base de datos
        * Valida que el codigo y contraeña son validos
        * 
        * @param String $codUsuario Codigo del usuario que queremos validar
        * @param String $password Contraseña del usuario que queremos validar
        */
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
        
        /**
        * Registra una nueva conexion
        * 
        * Actualiza el numero de conexiones y la fecha de la última conexión del usuario que se ha conectado
        * 
        * @param Usuario $oUsuario Objeto que guarda toda la información del usuario
        */
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
        
        /**
        * Registra un nuevo usuario en la base de datos
        * 
        * Registra un nuevo usuario con el codigo, contraseña y descripcción introduccidos
        * 
        * @param String $codUsuario Codigo del usuario que vamos a introduccir en la base de datos
        * @param String $password Contraseña del usuario que vamos a introduccir en la base de datos 
        * @param String $descripcion Descripcion del usuario que vamos a introduccir en la base de datos 
        */
        public static function altaUsuario($codUsuario, $password, $descripcion){
            $oDateTime = new DateTime();
            
            $consulta=<<<SQL
                INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones, T01_FechaHoraUltimaConexion) 
                VALUES ('{$codUsuario}', SHA2('{$codUsuario}{$password}', 256), '{$descripcion}', 1, '{$oDateTime->format("y-m-d h:i:s")}');
            SQL;
            
            if(DBPDO::ejecutarConsulta($consulta)){
                return new Usuario($codUsuario, $password, $descripcion, 1, $oDateTime->format("y-m-d h:i:s"), null, "usuario");
            }else{
                return false;
            }
        }
        
        /**
        * Comprueba que el codigo no existe
        * 
        * Comprueba que el codigo de usuario no existe ya en la base de datos
        * 
        * @param String $codUsuario Codigo que vamos a buscar en la base de datos 
        */
        public static function validarCodNoExiste($codUsuario){
            $consulta="SELECT T01_CodUsuario FROM T01_Usuario WHERE T01_CodUsuario='{$codUsuario}'";
            
            $oResultado=DBPDO::ejecutarConsulta($consulta);
            
            return $oResultado->fetchObject();
        }
        
        
        /**
        * Modificar el usuario
        * 
        * Modifica la descripcion de un usuario en la base de datos y en la session
        * 
        * @param Usuario $oUsuario Objeto que guarda toda la información del usuario
        * @param String $descUsuario Descripcion que vamos a actualizar
        */
        public static function modificarUsuario($oUsuario, $descUsuario){
            $consulta="UPDATE T01_Usuario SET T01_DescUsuario='{$descUsuario}' WHERE T01_CodUsuario='{$oUsuario->getCodUsuario()}'";
            
            $oUsuario->setDescUsuario($descUsuario);
            
            if(DBPDO::ejecutarConsulta($consulta)){
                return $oUsuario;
            }else{
                return false;
            }
        }

        /**
        * Cambiar contraseña de un usuario
        * 
        * Cambia la contraseña en la base de datos y en la sesion
        * 
        * @param Usuario $oUsuario Objeto que guarda toda la información del usuario
        * @param String $password Contraseña que vamos a actualizar
        */
        public static function cambiarPassword($oUsuario, $password){
            $consulta="UPDATE T01_Usuario SET T01_Password=SHA2('{$oUsuario->getCodUsuario()}{$password}', 256) WHERE T01_CodUsuario='{$oUsuario->getCodUsuario()}'";
            
            $oUsuario->setPassword($password);
            
            if(DBPDO::ejecutarConsulta($consulta)){
                return $oUsuario;
            }else{
                return false;
            }
        }
        
        /**
        * Elimina un usuario de la base de datos
        * 
        * Elimina un usuario de la base de datos
        * 
        * @param String $codUsuario Codigo del usuario que vamos a eliminar de la base de datos 
        */
        public static function borrarUsuario($codUsuario){
            $consulta="DELETE FROM T01_Usuario WHERE T01_CodUsuario='{$codUsuario}'";
            
            $oResultado=DBPDO::ejecutarConsulta($consulta);
        }
    }
?>
