<div class="vInicio">
    <header>
        <h1>Aplicación final</h1>
        <h3>Inicio privada</h3>
        <form method="post">
            <input type='submit' name='logout' value='Cerrar sesión'/>
        </form>
    </header><br>
    <?php
        echo 'Bienvenido <strong>'.$aVInicio['descUsuario'].'</strong>, es la '.$aVInicio['numConexiones'].' vez que se conecta ';
        if($_SESSION['usuarioDAW205AplicacionFinal']->getNumConexiones()!=1){
            echo 'y su última conexión fue el '.$_SESSION['usuarioDAW205AplicacionFinal']->getFechaHoraUltimaConexionAnterior().'.';
                    
        }
    ?>
    <br><br>
    <form method="post">
        <?php if($_SESSION["usuarioDAW205AplicacionFinal"]->getPerfil()=="usuario"){ ?>
            <input type='submit' name='mtoDep' value='Mtn. Dep.'/>
        <?php } ?>
        <?php if($_SESSION["usuarioDAW205AplicacionFinal"]->getPerfil()=="administrador"){ ?>
            <input type='submit' name='mtoUsuarios' value='Mtn. Usuarios'/>
        <?php } ?>
        <input type='submit' name='detalle' value='Detalle'/>
        <input type='submit' name='rest' value='REST'/>
        <input type='submit' name='editar' value='Editar perfil'/>
    </form>
</div>
