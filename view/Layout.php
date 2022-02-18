<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta charset="UTF-8" lang="es">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="webroot/css/estiloFooter.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/estiloCabecera.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/estilo.css" rel="stylesheet" type="text/css"/>
        <title>DPL - AplicacionFinal</title>
    </head>
    <body>
        <?php 
            include $aVistas[$_SESSION['paginaEnCurso']];
        ?>
        <footer>
            <table>
                <tr>
                    <td><a href="https://daw205.ieslossauces.es/"><p>David del Prado Losada</p></a></td>
                    <td><a href="https://github.com/DavidelPrado/205DWESAplicacionFinal" target="_blank"><img src="img/git.png" width="30px" height="30px"></img></a></td>
                    <td><a href="doc/index.html" target="_blank"><img src="img/phpDoc.png" width="30px" height="30px"></img></a></td>
                    <td><a href="" target="_blank"><img src="img/rss.png" width="30px" height="30px"></img></a></td>
                    <td><a href="img/curriculum-vitae-europass.pdf" target="_blank"><img src="img/cv.png" width="30px" height="30px"></img></a></td>
                    <td>
                        <form method="post" class="tecnologia">
                            <button type='submit' name='tecnologias' value="Tecnologias">
                                <img src="img/tecnologias.png" width="30px" height="30px">
                            </button>
                        </form>
                    </td>
                </tr>
            </table>
        </footer>
    </body>
</html>
