<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Controlador de la aplicación
    */

    include 'core/210322ValidacionFormularios.php';

    //Se incluye la lógica del modelo
    include 'model/DB.php';
    include 'model/UsuarioDB.php';
    include 'model/DBPDO.php';
    include 'model/Usuario.php';
    include 'model/UsuarioPDO.php';
    include 'model/AppError.php';
    include 'model/REST.php';
    include 'model/UsuarioAleatorio.php';
    include 'model/Palabra.php';
    
    //Definir constantes
    define("OBLIGATORIO", 1);
    define("OPCIONAL", 0);
    define("MIN_TAMANIO", 0);
    
    //Conexion con la base de datos.
    include 'config/confDB.php';

    //Array de los controladores
    $aControladores = [
        'inicioPublica' => 'controller/cInicioPublica.php',
        'login' => 'controller/cLogin.php',
        'inicio' => 'controller/cInicioPrivada.php',
        'detalle' => 'controller/cDetalle.php',
        'WIP' => 'controller/cWIP.php',
        'error' => 'controller/cError.php',
        'rest' => 'controller/cREST.php',
        'registro' => 'controller/cRegistro.php',
        'tecnologias' => 'controller/cTecnologias.php'
    ];

    //Array de las vistas
    $aVistas = [
        'inicioPublica' => 'view/vInicioPublica.php',
        'layout' => 'view/Layout.php',
        'login' => 'view/vLogin.php',
        'inicio' => 'view/vInicioPrivada.php',
        'detalle' => 'view/vDetalle.php',
        'WIP' => 'view/vWIP.php',
        'error' => 'view/vError.php',
        'rest' => 'view/vREST.php',
        'registro' => 'view/vRegistro.php',
        'tecnologias' => 'view/vTecnologias.php'
    ];
?>