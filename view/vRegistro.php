<?php
    /*
    * @author: David del Prado Losada
    * @since: 28/01/2022
    * @version: v1.0
    * 
    * Ventana con el formulario de registro
    */
?>
<header>
    <h1>Aplicación final</h1>
    <h3>Registro</h3>
</header>

<form method="post">
    <h2>Registro de un nuevo usuario:</h2>
    <label>Usuario:</label><br>

    <!--<input type='text' name='CodUsuario' value="<?php
        //Mostrar los datos correctos introducidos en un intento anterior
        echo isset($_REQUEST["CodUsuario"]) ? $_REQUEST["CodUsuario"] : "";
    ?>"/><p ><?php
        //Mostrar los errores en el CodUsuario, si los hay
        echo $aErrores["CodUsuario"]!=null ? $aErrores["CodUsuario"] : "";
    ?></p>

    <label>Contraseña:</label><br>
    <input type='password' name="Password" value="<?php
        //Mostrar los datos correctos introducidos en un intento anterior
        echo isset($_REQUEST["Password"]) ? $_REQUEST["Password"] : "";
    ?>"/><p ><?php
        //Mostrar los errores en la contraseña, si los hay
        echo $aErrores["Password"]!=null ? $aErrores["Password"] : "";
    ?></p>

    <label>Repetir contraseña:</label><br>
    <input type='password' name="RepetirPassword" value="<?php
        //Mostrar los datos correctos introducidos en un intento anterior
        echo isset($_REQUEST["RepetirPassword"]) ? $_REQUEST["RepetirPassword"] : "";
    ?>"/><p ><?php
        //Mostrar los errores en la contraseña, si los hay
        echo $aErrores["RepetirPassword"]!=null ? $aErrores["RepetirPassword"] : "";
    ?></p>

    <label>Descripcion:</label>
    <input type="text" name="DescUsuario" value="<?php
        //Mostrar los datos correctos introducidos en un intento anterior
        echo isset($_REQUEST["DescUsuario"]) ? $_REQUEST["DescUsuario"] : "";
    ?>"/><p ><?php
        //Mostrar los errores en la DescUsuario, si los hay
        echo $aErrores["DescUsuario"]!=null ? $aErrores["DescUsuario"] : "";
    ?></p>-->

    <br><br>
    <input type='submit' name='crear' value='Crear'/>
    <input type='submit' name='cancelar' value='Cancelar'/>
</form>