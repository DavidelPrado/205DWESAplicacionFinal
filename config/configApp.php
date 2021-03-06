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
    include 'model/Palabra.php';
    include 'model/Departamento.php';
    include 'model/DepartamentoPDO.php';
    
    //Definir constantes
    define("OBLIGATORIO", 1);
    define("OPCIONAL", 0);
    define("MIN_TAMANIO", 4);
    
    //Conexion con la base de datos.
    include 'config/confDB.php';

    //Array de los controladores
    $aControladores = [
        'inicioPublico' => 'controller/cInicioPublica.php',
        'login' => 'controller/cLogin.php',
        'inicio' => 'controller/cInicioPrivada.php',
        'detalle' => 'controller/cDetalle.php',
        'WIP' => 'controller/cWIP.php',
        'error' => 'controller/cError.php',
        'rest' => 'controller/cREST.php',
        'registro' => 'controller/cRegistro.php',
        'tecnologias' => 'controller/cTecnologias.php',
        'editar' => 'controller/cMiCuenta.php',
        'borrar' => 'controller/cBorrarCuenta.php',
        'cambiar' => 'controller/cCambiarPassword.php',
        'mantenimiento' => 'controller/cMtoDepartamentos.php',
        'eliminar' => 'controller/cEliminarDepartamento.php',
        'alta' => 'controller/cAltaDepartamento.php',
        'modificar' => 'controller/cConsultarModificarDepartamento.php',
        'mantenimientoUsuarios' => 'controller/cMtoUsuarios.php'
    ];

    //Array de las vistas
    $aVistas = [
        'inicioPublico' => 'view/vInicioPublica.php',
        'layout' => 'view/Layout.php',
        'login' => 'view/vLogin.php',
        'inicio' => 'view/vInicioPrivada.php',
        'detalle' => 'view/vDetalle.php',
        'WIP' => 'view/vWIP.php',
        'error' => 'view/vError.php',
        'rest' => 'view/vREST.php',
        'registro' => 'view/vRegistro.php',
        'tecnologias' => 'view/vTecnologias.php',
        'editar' => 'view/vMiCuenta.php',
        'borrar' => 'view/vBorrarCuenta.php',
        'cambiar' => 'view/vCambiarPassword.php',
        'mantenimiento' => 'view/vMtoDepartamentos.php',
        'eliminar' => 'view/vEliminarDepartamento.php',
        'alta' => 'view/vAltaDepartamento.php',
        'modificar' => 'view/vConsultarModificarDepartamento.php',
        'mantenimientoUsuarios' => 'view/vMtoUsuarios.php'
    ];
?>
