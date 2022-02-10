<?php
    /**
    * Conexion con la base de datos y ejecucion de una consulta utilizando PDO
    * 
    * 
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    */

    class DBPDO implements DB{
        /**
        * Ejecuta consulta sql en PDO
        * 
        * Obtiene la consulta que debe ejecutar y los parametros, si los hay.
        * 
        * @param String $consulta Consulta sql que se debe ejecutar
        * @param String $parametros Parametros de la consulta
        */
        public static function ejecutarConsulta($consulta, $parametros=null){
            try{
                //Conectar a la base de datos
                $DB = new PDO(HOST, USER, PASSWORD);
                //Configurar las excepciones
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Preparación y ejecución de la consulta con sus parámetros.
                $oResultado = $DB->prepare($consulta);
                $oResultado->execute($parametros);

                return $oResultado;
            }catch(PDOException $exception){
                //En caso de error guarda un objeto de la clase AppError en la variable de sesion error
                $_SESSION['error'] = new AppError($exception->getCode(), $exception->getMessage(), $exception->getFile(), $exception->getLine(), 'inicio');
                
                $_SESSION['paginaEnCurso'] = 'error';
                header('location: ./index.php');
                exit;
            }finally{
                unset($DB);
            }
        }
    }
?>