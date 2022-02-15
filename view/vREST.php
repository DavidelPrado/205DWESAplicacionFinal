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
            ?>"/><p><?php
            //Mostrar los errores en el codDepartamento, si los hay
            echo $aErrores["palabra"]!=null ? $aErrores["palabra"] : "";
            ?></p>

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
            ?>"/><p><?php
            //Mostrar los errores en el codDepartamento, si los hay
            echo $aErroresDep["codDepartamento"]!=null ? $aErroresDep["codDepartamento"] : "";
            ?></p>

            <input type='submit' name='buscarCodDep' value='Buscar'/>
        </form>
        
        <form method="post">
            <legend><h2>Buscar departamento por codigo(Sonia):</h2></legend>

            <label>Codigo:</label><br>
            <input type='text' name='codDepartamentoExt' value="<?php
            //Mostrar los datos correctos introducidos en un intento anterior
            echo isset($_REQUEST["codDepartamentoExt"]) ? $_REQUEST["codDepartamentoExt"] : "";
            ?>"/><p><?php
            //Mostrar los errores en el codDepartamento, si los hay
            echo $aErroresDepExt["codDepartamentoExt"]!=null ? $aErroresDepExt["codDepartamentoExt"] : "";
            ?></p>

            <input type='submit' name='buscarCodDepExt' value='Buscar'/>
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
    
    if(isset($aDepartamento)){
        if($aDepartamento==null){
            ?><p>No se ha encontrado el departamento</p><?php
        }else{
        ?>
        
        <p>codDep: <?php echo $aDepartamento["codDepartamento"];?></p>
        <p>descDep: <?php echo $aDepartamento["descDepartamento"];?></p>
        <p>fechaAlta: <?php echo $aDepartamento["fechaCreacionDepartamento"];?></p>
        <p>volNegocio: <?php echo $aDepartamento["volumenDeNegocio"];?></p>
        <?php
            if($aDepartamento["fechaBajaDepartamento"]){
        ?>
        <p>fechaBaja: <?php echo $aDepartamento["fechaBajaDepartamento"];?></p>
        <?php } ?>
    <?php
        }
    }
    
    if(isset($aDepartamentoExt)){
        if($aDepartamentoExt==null){
            ?><p>No se ha encontrado el departamento</p><?php
        }else{
        ?>
        
        <p>codDep: <?php echo $aDepartamentoExt["codDepartamento"];?></p>
        <p>descDep: <?php echo $aDepartamentoExt["descDepartamento"];?></p>
        <p>fechaAlta: <?php echo $aDepartamentoExt["fechaCreacionDepartamento"];?></p>
        <p>volNegocio: <?php echo $aDepartamentoExt["volumenDeNegocio"];?></p>
        <?php
            if($aDepartamentoExt["fechaBajaDepartamento"]){
        ?>
        <p>fechaBaja: <?php echo $aDepartamentoExt["fechaBajaDepartamento"];?></p>
        <?php } ?>
    <?php
        }
    }
    ?>    
</div>