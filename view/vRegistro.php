<header>
    <h1>Aplicación final</h1>
    <h3>Registro</h3>
</header>

<form method="post">
    <h2>Registro de un nuevo usuario:</h2>
    
    <label>Usuario:</label><br>
    <input type='text' name='usuario' value="<?php
        //Mostrar los datos correctos introducidos en un intento anterior
        echo isset($_REQUEST["usuairo"]) ? $_REQUEST["usuario"] : "";
    ?>"/><p><?php
        //Mostrar los errores en el usuario, si los hay
        echo $aErrores["usuario"]!=null ? $aErrores["usuario"] : "";
    ?></p>

    <label>Contraseña:</label><br>
    <input type='password' name="password" value="<?php
        //Mostrar los datos correctos introducidos en un intento anterior
        echo isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";
    ?>"/><p ><?php
        //Mostrar los errores en la contraseña, si los hay
        echo $aErrores["password"]!=null ? $aErrores["password"] : "";
    ?></p>

    <label>Descripcion:</label><br>
    <input type="text" name="descripcion" value="<?php
        //Mostrar los datos correctos introducidos en un intento anterior
        echo isset($_REQUEST["descripcion"]) ? $_REQUEST["descripcion"] : "";
    ?>"/><p ><?php
        //Mostrar los errores en la descripcion, si los hay
        echo $aErrores["descripcion"]!=null ? $aErrores["descripcion"] : "";
    ?></p>

    <br><br>
    <input type='submit' name='crear' value='Crear'/>
    <input type='submit' name='cancelar' value='Cancelar'/>
</form>