<?php
    /*
    * @author: David del Prado Losada
    * @since: 26/01/2022
    * @version: v1.0
    * 
    * Modelo de las apiREST utilizadas
    */

    class REST{
        public static function usuarioAleatorio(){
            $oJSON=file_get_contents('https://randomuser.me/api/?noinfo');
    
            $aJSON=json_decode($oJSON);
            
            foreach($aJSON as $valor){
                foreach($valor as $salida){
                    return $salida;
                }
            }
        }
        
        public static function buscarPalabra($idioma, $palabra){
            $oJSON= file_get_contents('https://api.dictionaryapi.dev/api/v2/entries/'.$idioma.'/'.$palabra.'');
            
            $aSalida=json_decode($oJSON)[0];
            
            return new Palabra($aSalida->word, $aSalida->origin??"no", $aSalida->meanings);
        }
    }
?>