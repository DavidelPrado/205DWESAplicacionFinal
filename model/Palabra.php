<?php
    /*
    * Clase de construcción de objetos palabraa
    * 
    * 
    * 
    * @author: David del Prado Losada
    * @since: 26/01/2022
    * @version: v1.0
    */

    class Palabra{
        public $palabra;
        public $origen;
        public $significados;

        /*
        * Constructor de objetos palabra
        * 
        * Obtiene la palabra, origen y significados y crea un objeto
        * 
        * @param String $palabra Palabra a buscar en el diccionario
        * @param String $origen Origen de la palabra
        * @param String $significados Significados y sinonimos de la palabra
        */
        public function __construct($palabra, $origen, $significados){
            $this->palabra=$palabra;
            $this->origen=$origen;
            $this->significados=$significados;
        }
    }
?>