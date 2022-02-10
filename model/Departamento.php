<?php
    /**
    * Clase que guarda la información del departamento
    * 
    * 
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    */

    class Departamento{
        private $codDepartamento;
        private $descDepartamento;
        private $fechaCreacionDepartamento;
        private $volumenDeNegocio;
        private $fechaBajaDepartamento;
        
        /**
        * Constructor de objetos de Departamento
        * 
        * Obtiene el codigo y descripcion del error, el archivo y linea donde ha ocurrido el error 
        * y la pagina a la que debe ir.
        * 
        * @param String $codDepartamento Codigo identificador del departamento
        * @param String $descDepartamento Descripcion del departamento
        * @param String $fechaCreacionDepartamento Fecha y hora de la creacion del departamento
        * @param String $volumenDeNegocio volumenDeNegocio
        * @param String $fechaBajaDepartamento Fecha y hora de la baja del departamento
        */
        function __construct($codDepartamento, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento=null) {
            $this->codDepartamento = $codDepartamento;
            $this->descDepartamento = $descDepartamento;
            $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
            $this->volumenDeNegocio = $volumenDeNegocio;
            $this->$fechaBajaDepartamento = $fechaBajaDepartamento;
        }
    }
?>
