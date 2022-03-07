<header>
    <h1>Aplicación final</h1>
    <h3>Mantenimiento usuarios</h3>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</header>
<form method="post">
    <fieldset>
        <input class="boton" type="submit" name="altaDep" value="Alta"/>
        <input class="boton" type="submit" name="importar" value="Importar"/>
        <input class="boton" type="submit" name="exportar" value="Exportar"/>
        <fieldset>
            <label>Descripción:</label>
            <input type='text' name='descripcion' value="<?php
                echo isset($_SESSION["criterioBusquedaDepartamentos"]["descripcionBuscada"]) ? $_SESSION["criterioBusquedaDepartamentos"]["descripcionBuscada"] : "";
            ?>"/>
            
            <input type='submit' name='enviar' value='Enviar'/>
        </fieldset>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Contraseña</th>
                    <th>Descripción</th>
                    <th>Fecha y hora última conexión</th>
                    <th>Número de conexiones</th>
                    <th>Perfil</th>
                    <th>Imagen</th>
                </tr> 
            </thead>
            <tbody id="usuarios">
                
            </tbody>
        </table>
        
        <script>
            
        </script>
    </fieldset>
</form>