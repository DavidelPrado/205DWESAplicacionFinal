<div class="vInicio">
    <header>
        <h1>Aplicación final</h1>
        <h3>Inicio privada</h3>
    </header><br>
    <?php
        echo 'Bienvenido '.$aVInicio['descUsuario'].' es la '.$aVInicio['numConexiones'].' vez que se conecta y su última conexión fue '.$_SESSION['usuarioDAW205AppLoginLogout']->getFechaHoraUltimaConexionAnterior().'';
    ?>
    <br><br>
    <form method="post">
        <input type='submit' name='mtoDep' value='Mantenimiento Departamentos'/>
        <input type='submit' name='detalle' value='Detalle'/>
        <input type='submit' name='error' value='Provocar error'/>
        <input type='submit' name='rest' value='REST'/>
        <input type='submit' name='logout' value='Cerrar sesión'/>
    </form>
</div>