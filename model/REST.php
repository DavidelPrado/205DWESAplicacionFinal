<?php
    /**
    * Modelo de las apiREST utilizadas
    * 
    * 
    * @author: David del Prado Losada
    * @since: 26/01/2022
    * @version: v1.0
    */

    class REST{
        /**
        * Llamada a una api diccionario
        * 
        * Llama a una api diccionario con el idioma y la palabra que estamos buscando y devulve el origen y
        * significados de la palabra en un objeto Palabra
        * 
        * @param String $idioma Idioma de la palabra
        * @param String $palabra Palabra de la que queremos obtener los significados
        */
        public static function buscarPalabra($idioma, $palabra){
            $oJSON=file_get_contents("https://api.dictionaryapi.dev/api/v2/entries/{$idioma}/{$palabra}");
            
            $salida=json_decode($oJSON)[0];
            
            if(is_object($salida)){
                return new Palabra($salida->word, $salida->origin??"Desconocido", $salida->meanings);
            }
        }
        
        /**
        * Llamada a una api de busqueda en una base de datos
        * 
        * Llama a una api que busca un departamento usando el codigo
        * 
        * @param String $codDepartamento Codigo del departamento a buscar
        */
        public static function buscarDepartamentoPorCodigo($codDepartamento){
            $oJSON=file_get_contents("https://daw205.ieslossauces.es/205DWESAplicacionFinal/api/BuscarDepPorCodigo.php?codDepartamento={$codDepartamento}");
            
            $salida=json_decode($oJSON, true);
            
            if(isset($salida["codDepartamento"])){
                return new Departamento(
                    $salida["codDepartamento"],
                    $salida["descDepartamento"],
                    $salida["fechaCreacionDepartamento"],
                    $salida["volumenDeNegocio"],
                    $salida["fechaBajaDepartamento"],
                );
            }else{
                return null;
            }
        }
        
        /**
        * Llamada a una api externa de busqueda en una base de datos
        * 
        * Llama a una api que busca un departamento usando el codigo
        * 
        * @param String $codDepartamento Codigo del departamento a buscar
        */
        public static function buscarDepartamentoPorCodigoExterno($codDepartamento){
            $oJSON=file_get_contents("https://daw219.ieslossauces.es/219DWESAplicacionFinal21-22/api/consultaDepartamentoPorCodigo.php?codDepartamento={$codDepartamento}");
            
            $salida=json_decode($oJSON, true);
            
            if(isset($salida["respuesta"])!=false){
                return new Departamento(
                    $salida["codigo"],
                    $salida["descripcion"],
                    $salida["fechaAlta"],
                    $salida["volumenNeg"],
                    $salida["fechaBaja"],
                );
            }else{
                return null;
            }
        }
    }
?>