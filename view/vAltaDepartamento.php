<header>
    <h1>Aplicación final</h1>
    <h3>Alta departamento</h3>
</header>
<div class="vEditar">
    <form method="post">
        <h2>Añadir departamento:</h2>
        
        <label>Codigo departamento:</label><br>
        <input type='text' name='codDepartamento' value="<?php
            //Mostrar los datos correctos introducidos en un intento anterior
            echo isset($_REQUEST["codDepartamento"]) ? $_REQUEST["codDepartamento"] : "";
        ?>"/><p><?php
            //Mostrar los errores en el codDepartamento, si los hay
            echo $aErrores["codDepartamento"]!=null ? $aErrores["codDepartamento"] : "";
        ?></p>

        <label>Descripción:</label><br>
        <input type="text" name="descripcion" value="<?php
            //Mostrar los datos correctos introducidos en un intento anterior
            echo isset($_REQUEST["descripcion"]) ? $_REQUEST["descripcion"] : "";
        ?>"/><p><?php
            //Mostrar los errores en la descripcion, si los hay
            echo $aErrores["descripcion"]!=null ? $aErrores["descripcion"] : "";
        ?></p>

        <label>Volumen de negocio:</label><br>
        <input type='text' name='volumen' value="<?php
            //Mostrar los datos correctos introducidos en un intento anterior
            echo isset($_REQUEST["volumen"]) ? $_REQUEST["volumen"] : "";
        ?>"/><p><?php
            //Mostrar los errores en el usuario, si los hay
            echo $aErrores["volumen"]!=null ? $aErrores["volumen"] : "";
        ?></p>
        
        <div class="botones">
            <input type='submit' name='crear' value='Crear'/><br>
            <input type='submit' name='cancelar' value='Cancelar'/>
        </div>
    </form>
</div>
