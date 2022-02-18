<header>
    <h1>Aplicación final</h1>
    <h3>Editar</h3>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</header>
<div class="vEditar">
    <form method="post">
        <h2>Editar perfil de usuario:</h2>
        
        <label>Usuario:</label><br>
        <input type='text' name='usuario' value="<?php
            echo $usuario;
        ?>" disabled/><br><br>

        <label>Descripción:</label><br>
        <input type="text" name="descripcion" value="<?php
            echo isset($_REQUEST["descripcion"]) ? $_REQUEST["descripcion"] : $descripcion;
        ?>"/><p ><?php
            echo $aErrores["descripcion"]!=null ? $aErrores["descripcion"] : "";
        ?></p><br>

        <label>Contraseña:</label><br>
        <input type='password' name='password' value="<?php
            echo $password;
        ?>" disabled/><br><br>
        
        <label>Número de conexiones:</label><br>
        <input type='text' name='nConexiones' value="<?php
            echo $nConexiones;
        ?>" disabled/><br><br>

        <label>Fecha última conexión:</label><br>
        <input type='text' name='fecha' value="<?php
            echo $fecha;
        ?>" disabled/><br><br>

        <div class="botones">
            <input type='submit' name='aceptar' value='Aceptar'/><br>
            <input class="borrar" type='submit' name='borrar' value='Borrar cuenta'/><br>
            <input type='submit' name='cambiar' value='Cambiar contraseña'/>
        </div>
    </form>
</div>
