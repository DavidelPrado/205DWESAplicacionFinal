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
            <label>Descripcion:</label>
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
                <th>CodDepartamento</th>
                <th>DescDepartamento</th>
                <th>FechaBaja</th>
                <th>VolumenNegocio</th>
            </tr>
            <?php
            if(isset($oDepartamento)){
                while($oDepartamento){
                    echo '<tr>';
                    foreach ($oDepartamento as $valor) {
                        echo "<td>$valor</td>";
                    }
                    ?>
                        <td><a href="./MtoDepartamentosModificar.php"><img src="../img/lapiz.png"></img></a></td>
                        <td><a><img src="../img/papelera.png" heigth="30px"></img></a></td>
                        <td><a><img src="../img/ojo.png" width="30px"></img></a></td>
                    <?php
                    echo '</tr>';
                    $oDepartamento=$oResultado->fetchObject();
                }
            }
            ?>
        </table>
    </fieldset>
</form>