<?php
    /*
    * @author: David del Prado Losada
    * @since: 26/01/2022
    * @version: v1.0
    * 
    * Modelo de las apiREST utilizadas
    */

    class UsuarioAleatorio{
        private $gender;
        private $name;
        //private $location;
        private $email;
        private $login;
        //private $dob;
        //private $registered;
        //private $phone;
        //private $cell;
        //private $id;
        //private $picture;
        private $nat;

        public function __construct($gender, $name, $email, $login, $nat){
            $this->gender=$gender;
            $this->name=$name;
            $this->email=$email;
            $this->login=$login;
            $this->nat=$nat;
        }
        
        function getGender(){
            return $this->gender;
        }
        function getName(){
            return $this->name;
        }
        function getEmail(){
            return $this->email;
        }
        function getLogin(){
            return $this->login;
        }
        function getNat(){
            return $this->nat;
        }
        
        function setGender(){
            $this->gender=$gender;
        }
        function setName(){
            $this->name=$name;
        }
        function setEmail(){
            $this->email=$email;
        }
        function setLogin(){
            $this->login=$login;
        }
        function setNat(){
            $this->nat=$nat;
        }
    }
?>