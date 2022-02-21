<header>
    <h1>Aplicación final</h1>
    <h3>Eliminar departamento</h3>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</header>
<div class="vEditar">
    <form method="post">
        <h2>Eliminar departamento:</h2>
        
        <label>Codigo departamento:</label><br>
        <input type='text' name='codDepartamento' value="<?php
            echo $aVDepartamento["codDepartamento"];
        ?>" disabled/><br><br>

        <label>Descripción:</label><br>
        <input type="text" name="descripcion" value="<?php
            echo $aVDepartamento["descripcion"];
        ?>" disabled/><br><br>

        <label>Fecha última conexión:</label><br>
        <input type='text' name='fecha' value="<?php
            echo $aVDepartamento['fecha'];
        ?>" disabled/><br><br><br>

        <label>Volumen de negocio:</label><br>
        <input type='text' name='text' value="<?php
            echo $aVDepartamento['volumen'];
        ?>" disabled/><br><br>

        <h2>¿Estas seguro?</h2>
        
        <div class="botones">
            <input class="eliminar" type='submit' name='aceptar' value='Aceptar'/>
        </div>
    </form>
</div>
