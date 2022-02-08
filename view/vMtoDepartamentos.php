<header>
    <h1>Aplicación final</h1>
    <h3>Mantenimiento departamentos</h3>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</header>
<form method="post">
    <fieldset>
        <fieldset>
            <label>Codigo:</label>
            <input type='text' name='codigo' value="<?php
                //Mostrar los datos correctos introducidos en un intento anterior
                echo isset($_REQUEST["codigo"]) ? $_REQUEST["codigo"] : "";
            ?>"/><?php
                //Mostrar los errores en la descripcion, si los hay
                echo $aErrores["codigo"]!=null ? $aErrores["codigo"] : "";
            ?>
            <input type='submit' name='enviar' value='Enviar'/>
        </fieldset>
        <table>
            <tr>
                <th>CodDepartamento</th>
                <th>DescDepartamento</th>
                <th>FechaBaja</th>
                <th>VolumenNegocio</th>
            </tr>
            
        </table>
    </fieldset>
</form>