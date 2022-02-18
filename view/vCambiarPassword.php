<header>
    <h1>Aplicación final</h1>
    <h3>CambiarContraseña</h3>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</header>
<div class="vEditar">
    <form method="post">
        <h2>Cambiar contraseña:</h2>
        
        <label>Contraseña actual:</label><br>
        <input type="password" name="password" value="<?php
            echo isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";
        ?>"/><p><?php
            echo $aErrores["password"]!=null ? $aErrores["password"] : "";
        ?></p><br>

        <label>Contraseña nueva:</label><br>
        <input type="password" name="passwordNueva" value="<?php
            echo isset($_REQUEST["passwordNueva"]) ? $_REQUEST["passwordNueva"] : "";
        ?>"/><p><?php
            echo $aErrores["passwordNueva"]!=null ? $aErrores["passwordNueva"] : "";
        ?></p><br>

        <label>Repetir contraseña nueva:</label><br>
        <input type="password" name="repetirPasswordNueva" value="<?php
            echo isset($_REQUEST["repetirPasswordNueva"]) ? $_REQUEST["repetirPasswordNueva"] : "";
        ?>"/><p><?php
            echo $aErrores["repetirPasswordNueva"]!=null ? $aErrores["repetirPasswordNueva"] : "";
        ?></p><br>

        <div class="botones">
            <input type='submit' name='aceptar' value='Aceptar'/>
        </div>
    </form>
</div>
