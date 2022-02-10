<?php
    /**
    * Clase que guarda la información del usuario
    * 
    * 
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    */

    class Usuario{
        private $codUsuario;
        private $password;
        private $descUsuario;
        private $numConexiones;
        private $fechaHoraUltimaConexion;
        private $fechaHoraUltimaConexionAnterior;
        private $perfil;
        
        /**
        * Constructor de objetos de usuario
        * 
        * Obtiene el codigo y descripcion del error, el archivo y linea donde ha ocurrido el error 
        * y la pagina a la que debe ir.
        * 
        * @param String $codUsuario Codigo identificador del usuario
        * @param String $password Contraseña cifrada del usuario
        * @param String $descUsuario Descripcion del usuario
        * @param String $numConexiones Numero de veces que se ha conectado el usuario
        * @param String $fechaHoraUltimaConexion Fecha y hora de la ultima conexion
        * @param String $fechaHoraUltimaConexionAnterior Fecha y hora de la conexion anterior a la ultima
        * @param String $perfil Tipo de perfil del usuario ya sea usuario o administrador
        */
        function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil) {
            $this->codUsuario = $codUsuario;
            $this->password = $password;
            $this->descUsuario = $descUsuario;
            $this->numConexiones = $numConexiones;
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
            $this->$fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
            $this->perfil = $perfil;
        }
        
        function getCodUsuario(){
            return $this->codUsuario;
        }
        function getPassword(){
            return $this->password;
        }
        function getDescUsuario(){
            return $this->descUsuario;
        }
        function getNumConexiones(){
            return $this->numConexiones;
        }
        function getFechaHoraUltimaConexion(){
            return $this->fechaHoraUltimaConexion;
        }
        function getFechaHoraUltimaConexionAnterior(){
            return $this->fechaHoraUltimaConexionAnterior;
        }
        function getPerfil(){
            return $this->perfil;
        }
        
        function setCodUsuario($codUsuario){
           $this->codUsuario=$codUsuario; 
        }
        function setPassword($password){
            $this->password=$password;
        }
        function setDescUsuario($descUsuario){
            $this->descUsuario=$descUsuario;
        }
        function setNumConexiones($numConexiones){
            $this->numConexiones=$numConexiones;
        }
        function setFechaHoraUltimaConexion($fechaHoraUltimaConexion){
            $this->fechaHoraUltimaConexion=$fechaHoraUltimaConexion;
        }
        function setFechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior){
            $this->fechaHoraUltimaConexionAnterior=$fechaHoraUltimaConexionAnterior;
        }
        function setPerfil($perfil){
            $this->perfil=$perfil;
        }
    }
?>
