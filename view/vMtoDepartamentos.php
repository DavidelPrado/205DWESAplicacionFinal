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
            <label>Descripción:</label>
            <input type='text' name='descripcion' value="<?php
                //Mostrar los datos correctos introducidos en un intento anterior
                echo isset($_REQUEST["descripcion"]) ? $_REQUEST["descripcion"] : "";
            ?>"/><?php
                //Mostrar los errores en la descripcion, si los hay
                echo $aErrores["descripcion"]!=null ? $aErrores["descripcion"] : "";
            ?>
            <input type='submit' name='enviar' value='Enviar'/>
        </fieldset>
        <table>
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Fecha de creacion</th>
                <th>Volumen de negocio</th>
                <th>Fecha de baja</th>
                <th colspan="3">Botones</th>
            </tr>
            <?php
            if(isset($aVDepartamentos)){
                foreach ($aVDepartamentos as $departamento) {
                    ?>
                    <tr>
                        <td><?php echo $departamento["CodDepartamento"]; ?></td>
                        <td><?php echo $departamento["DescDepartamento"]; ?></td>
                        <td><?php echo $departamento["FechaCreacionDepartamento"]; ?></td>
                        <td><?php echo $departamento["VolumenDeNegocio"]; ?></td>
                        <td><?php echo $departamento["FechaBajaDepartamento"]; ?></td>

                        <td><a><img src="./img/lapiz.png"></img></a></td>
                        <td><a><img src="./img/papelera.png" heigth="30px"></img></a></td>
                        <td><a><img src="./img/ojo.png" width="30px"></img></a></td>
                    
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </fieldset>
</form>