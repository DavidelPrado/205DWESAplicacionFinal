<header>
    <h1>Aplicación final</h1>
    <h3>Mantenimiento departamentos</h3>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</header>
<form method="post">
    <fieldset>
        <input class="alta" type="submit" name="alta" value="Alta"/>
        <fieldset>
            <label>Descripción:</label>
            <input type='text' name='descripcion'/>
            
            <input name="criterioBusqueda" type="radio" value="todos" checked/>
            <label>Todos</label>
            <input name="criterioBusqueda" type="radio" value="alta"/>
            <label>Alta</label>
            <input name="criterioBusqueda" type="radio" value="baja"/>
            <label>Baja</label>
            
            <input type='submit' name='enviar' value='Enviar'/>
        </fieldset>
        <table>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Fecha de creación</th>
                <th>Volumen de negocio</th>
                <th>Fecha de baja</th>
                <th>Modificar departamento</th>
                <th>Eliminar departamento</th>
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

                        <td>
                            <button class="botonImg" type="submit" name="modificar" value="<?php echo $departamento["CodDepartamento"]; ?>">
                                <img src="./img/lapiz.png" width="30px"></img>
                            </button>
                        </td>

                        <td>
                            <button class="botonImg" type="submit" name="eliminar" value="<?php echo $departamento["CodDepartamento"]; ?>">
                                <img src="./img/papelera.png" width="30px"></img>
                            </button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        <div class="paginacion">
            <button type="submit" name="primera" value="primera">
                <img src="img/primera.png">
            </button>
            <button type="submit" name="anterior" value="anterior">
                <img src="img/anterior.png">
            </button>

            <div><?php echo $_SESSION['numPagina']; ?></div>

            <button type="submit" name="siguiente" value="siguiente">
                <img src="img/siguiente.png">
            </button>
            <button type="submit" name="ultima" value="ultima">
                <img src="img/ultima.png">
            </button>
        </div>
    </fieldset>
</form>