<header>
    <h1>Aplicación final</h1>
    <h3>Borrar cuenta</h3>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</header>
<div class="vEditar">
    <form method="post">
        <h2>Borrar cuenta:</h2>
        
        <label>Usuario:</label><br>
        <input type='text' name='usuario' value="<?php
            echo $usuario;
        ?>" disabled/><br><br>

        <label>Descripción:</label><br>
        <input type="text" name="descripcion" value="<?php
            echo $descripcion;
        ?>" disabled/><br><br>

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
        ?>" disabled/><br><br><br>

        <h2>¿Estas seguro?</h2>
        
        <div class="botones">
            <input class="borrar" type='submit' name='aceptar' value='Aceptar'/>
        </div>
    </form>
</div>
