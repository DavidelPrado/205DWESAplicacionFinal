<header>
    <h1>Aplicación final</h1>
    <h3>Modificar departamento</h3>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</header>
<div class="vEditar">
    <form method="post">
        <h2>Modificar departamento:</h2>
        
        <label>Codigo:</label><br>
        <input type='text' name='codDepartamento' value="<?php
            echo $aVDepartamento["codDepartamento"];
        ?>" disabled/><br><br>

        <label>Descripción:</label><br>
        <input type="text" name="descripcion" value="<?php
            echo isset($_REQUEST["descripcion"]) ? $_REQUEST["descripcion"] : $aVDepartamento["descripcion"];
        ?>"/><p ><?php
            echo $aErrores["descripcion"]!=null ? $aErrores["descripcion"] : "";
        ?></p><br>

        <label>Fecha creación:</label><br>
        <input type='text' name='fecha' value="<?php
            echo $aVDepartamento["fecha"];
        ?>" disabled/><br><br>
        
        <label>Volumen de negocio:</label><br>
        <input type='text' name='volumen' value="<?php
            echo isset($_REQUEST["volumen"]) ? $_REQUEST["volumen"] : $aVDepartamento["volumen"];
        ?>"/><p ><?php
            echo $aErrores["volumen"]!=null ? $aErrores["volumen"] : "";
        ?></p><br><br>

        <div class="botones">
            <input type='submit' name='aceptar' value='Aceptar'/><br>
        </div>
    </form>
</div>
