<div class="vREST">
    <header>
        <h1>Aplicación final</h1>
        <h3>REST</h3>
        <form method="post">
            <input type='submit' name='volver' value='Volver'/>
        </form>
    </header><br>
    
    <div class="formularios">
        <form method="post">
            <legend><h2>Diccionario:</h2></legend>

            <label>Palabra:</label><br>
            <input type='text' name='palabra' value="<?php
            //Mostrar los datos correctos introducidos en un intento anterior
            echo isset($_REQUEST["palabra"]) ? $_REQUEST["palabra"] : "";
            ?>"/><br><br>

            <label>Idioma:</label><br>
            <select name="idioma">
                <option value="ES">Español</option>
                <option value="EN">Ingles</option>
                <option value="FR">Frances</option>
            </select>

            <br><br>
            <input type='submit' name='buscar' value='Buscar'/>
        </form>

        <form method="post">
            <legend><h2>Buscar departamento por codigo:</h2></legend>

            <label>Codigo:</label><br>
            <input type='text' name='codDepartamento' value="<?php
            //Mostrar los datos correctos introducidos en un intento anterior
            echo isset($_REQUEST["codDepartamento"]) ? $_REQUEST["codDepartamento"] : "";
            ?>"/><br><br>

            <input type='submit' name='buscarCodDep' value='Buscar'/>
        </form>
    </div>
    
    
    <?php 
    if(isset($aVPalabra)){?>
        <h2>Palabra: <?php print_r($aVPalabra["palabra"]);?></h2>
        <h3>Origen: <?php print_r($aVPalabra["origen"]);?></h3>
        <?php foreach ($aVPalabra["significados"] as $aMeaning){ ?>
            <article>
                <h3><?php
                    echo ($aMeaning->partOfSpeech)??'';
                ?></h3>
                <ol>
                    <?php
                    foreach ($aMeaning->definitions as $aDefinition) {
                        echo "<li>$aDefinition->definition";
                        if (!empty($aDefinition->synonyms)) {
                            ?>
                            <div>
                                <h4>Sinónimos:</h4>
                                <div><?php echo implode(', ', $aDefinition->synonyms); ?></div>
                            </div>
                            <?php
                        }
                        if (!empty($aDefinition->antonyms)) {
                            ?>
                            <div>
                                <h4>Antónimos:</h4>
                                <div><?php echo implode(', ', $aDefinition->antonyms); ?></div>
                            </div>
                            <?php
                        }
                        echo '</li>';
                    }
                    ?>
                </ol>
            </article><?php
        }
        ?>
    <?php
    }
    
    if(isset($aDepartamento)){?>
        <p>codDep: <?php print_r($aDepartamento["codDepartamento"]);?></p>
        <p>descDep: <?php print_r($aDepartamento["descDepartamento"]);?></p>
        <p>fechaAlta: <?php print_r($aDepartamento["fechaCreacionDepartamento"]);?></p>
        <p>volNegocio: <?php print_r($aDepartamento["volumenDeNegocio"]);?></p>
        <p>fechaBaja: <?php print_r($aDepartamento["fechaBajaDepartamento"]);?></p>
        <?php
    }
    ?>
</div>