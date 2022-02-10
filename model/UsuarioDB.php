<?php
    /**
    * Interfaz de validacion de un usuario en la base de datos
    * 
    * 
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    */

    interface UsuarioDB{
        public static function validarUsuario($codUsuario, $password);
    }
?>