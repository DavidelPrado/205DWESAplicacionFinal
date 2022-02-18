<header>
    <h1>Aplicación final</h1>
    <h3>Detalle</h3>
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
</header><br>
<div class="vDetalle">
    <?php 
        echo '<h3>Contenido de las variables superglobales: <h3>';

        echo '<h4>Variable $_SESSION: </h4>';
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';

        echo '<h4>Variable $_COOKIE: </h4>';
        echo '<pre>';
        print_r($_COOKIE);
        echo '</pre>';

        echo '<h4>Variable $GLOBALS: </h4>';
        echo '<pre>';
        print_r($GLOBALS);
        echo '</pre>';

        echo '<h4>Variable $_SERVER: </h4>';
        echo '<pre>';
        print_r($_SERVER);
        echo '</pre>';

        echo '<h4>Variable $_FILES: </h4>';
        echo '<pre>';
        print_r($_FILES);
        echo '</pre>';

        echo '<h4>Variable $_ENV: </h4>';
        echo '<pre>';
        print_r($_ENV);
        echo '</pre>';

        echo '<h4>Variable $_REQUEST: </h4>';
        echo '<pre>';
        print_r($_REQUEST);
        echo '</pre>';

        echo '<h3>PHPInfo: <h3>';
        phpinfo();
    ?>
</div>
