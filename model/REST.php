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
            $oJSON=file_get_contents('https://randomuser.me/api/?inc=gender,name,email,login,nat&noinfo');
    
            $aJSON=json_decode($oJSON, true);
            
            $aUsuario=[];
            
            foreach($aJSON as $valor){
                $aUsuario=$valor;
            }
            
            return $aUsuario;
            //return $aJSON;
        }
    }
?>