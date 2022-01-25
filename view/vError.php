<?php
    /**
    * @author: David del Prado Losada
    * @since: 12/01/2022
    * @version: v1.0
    * 
    * Ventana de muestra de errores
    */
?>
<div class="vError">
    <h1>Error</h1>
    <h2>Ha ocurrido un error</h2>
    <table>
        <tr>
            <th>Código del error</th>
            <td><?php echo $_SESSION['error']->getCodError(); ?></td>
        </tr>
        <tr>
            <th>Descripción del error</th>
            <td><?php echo $_SESSION['error']->getDescError(); ?></td>
        </tr>
        <tr>
            <th>Archivo del error</th>
            <td><?php echo $_SESSION['error']->getArchivoError(); ?></td>
        </tr>
        <tr>
            <th>Linea del error</th>
            <td><?php echo $_SESSION['error']->getLineaError(); ?></td>
        </tr>
    </table>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</div>