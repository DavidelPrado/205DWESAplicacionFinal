<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta charset="UTF-8" lang="es">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="webroot/css/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/estiloError.css" rel="stylesheet" type="text/css"/>
        <title>DPL - AplicacionFinal</title>
    </head>
    <body>
        <?php 
            include $aVistas[$_SESSION['paginaEnCurso']];
        ?>
        <footer>
            <table>
                <tr>
                    <td><a href="https://daw205.ieslossauces.es/">David del Prado Losada</a></td>
                    <td><a href="https://github.com/DavidelPrado/205DWESAplicacionFinal" target="_blank"><img src="img/git.png" width="50px" height="50px"></img></a></td>
                    <td><a href="doc/index.html" target="_blank"><img src="img/phpDoc.png" width="50px" height="50px"></img></a></td>
                </tr>
            </table>
        </footer>
    </body>
</html>
