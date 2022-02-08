<?php
    /**
    * Clase que guarda los datos del los errores ocurridos en la aplicación
    * 
    * 
    * 
    * @author: David del Prado Losada
    * @since: 13/01/2022
    * @version: v1.0
    */
    
    class AppError{
        private $codError;
        private $descError;
        private $archivoError;
        private $lineaError;
        private $paginaSiguiente;
        
        /**
        * Constructor de objetos de error
        * 
        * Obtiene el codigo y descripcion del error, el archivo y linea donde ha ocurrido el error 
        * y la pagina a la que debe ir.
        * 
        * @param String $codError Codigo del error que ha ocurrido
        * @param String $descError Descripcion del error que ha ocurrido
        * @param String $archivoError Archivo donde ha ocurrido el error
        * @param String $lineaError Numero de linea donde a ocurrido el error
        * @param String $paginaSiguiente Pagina a la que se debe mover al pulsar el boton volver
        */
        function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente){
            $this->codError=$codError;
            $this->descError=$descError;
            $this->archivoError=$archivoError;
            $this->lineaError=$lineaError;
            $this->paginaSiguiente=$paginaSiguiente;
        }
        
        function getCodError(){
            return $this->codError;
        }
        function getDescError(){
            return $this->descError;
        }
        function getArchivoError(){
            return $this->archivoError;
        }
        function getLineaError(){
            return $this->lineaError;
        }
        function getPaginaSiguiente(){
            return $this->paginaSiguiente;
        }
        
        function setCodError($codError){
            $this->codError=$codError;
        }
        function setDescError($descError){
            return $this->descError=$descError;
        }
        function setArchivoError($archivoError){
            return $this->archivoError=$archivoError;
        }
        function setLineaError($lineaError){
            return $this->lineaError=$lineaError;
        }
        function setPaginaSiguiente($paginaSiguiente){
            return $this->paginaSiguiente=$paginaSiguiente;
        }
    }
?>