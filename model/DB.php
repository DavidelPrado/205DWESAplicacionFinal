<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Interfaz de ejecucion de una consulta en la base de datos
    */

    interface DB{
        public static function ejecutarConsulta($consulta, $parametros=null);
    }
?>