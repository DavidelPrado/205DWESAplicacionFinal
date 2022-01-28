<?php
    /*
    * @author: David del Prado Losada
    * @since: 24/01/2022
    * @version: v1.0
    * 
    * Ventana de la API
    */
?>
<div class="vREST">
    <header>
        <h1>Aplicación final</h1>
        <h3>REST</h3>
    </header><br>
    
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
    </form>
    <?php
        foreach($aMostrar as $valor){
            var_dump($valor);
        }
    ?>
</div>