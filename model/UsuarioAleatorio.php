<?php
    /**
    * Clase de construccion de objetos de usuarios aleatorios
    * 
    * 
    * @author: David del Prado Losada
    * @since: 26/01/2022
    * @version: v1.0
    */

    class UsuarioAleatorio{
        public $gender;
        public $name;
        public $location;
        public $email;
        public $login;
        public $dob;
        public $registered;
        public $phone;
        public $cell;
        public $id;
        public $picture;
        public $nat;

        public function __construct($gender, $name, $location, $email, $login, $dob, $registered, $phone, $cell, $id, $picture, $nat){
            $this->gender=$gender;
            $this->name=$name;
            $this->location=$location;
            $this->email=$email;
            $this->login=$login;
            $this->dob=$dob;
            $this->registered=$registered;
            $this->phone=$phone;
            $this->cell=$cell;
            $this->id=$id;
            $this->picture=$picture;
            $this->nat=$nat;
        }
    }
?>