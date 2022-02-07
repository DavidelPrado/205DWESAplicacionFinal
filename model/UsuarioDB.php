<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Interfaz de validacion de un usuario en la base de datos
    */

    interface UsuarioDB{
        public static function validarUsuario($codUsuario, $password);
    }
?>