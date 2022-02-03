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
    <!--
    <form method="post">
        <input type='submit' name='volver' value='Volver'/>
        <input type='submit' name='usuario' value='Generar usuario'/>
    </form>-->
    
    <form method="post">
        <legend><h2>Diccionario:</h2></legend>

        <label>Palabra:</label><br>
        <input type='text' name='palabra'/><br><br>
        
        <label>Idioma:</label><br>
        <select name="idioma">
            <option value="ES">Español</option>
            <option value="EN">Ingles</option>
            <option value="FR">Frances</option>
        </select>
        
        <br><br>
        <input type='submit' name='buscar' value='Buscar'/>
    </form>
    
    <?php 
    if(isset($aVPalabra)){?>
        <h2>Palabra: <?php print_r($aVPalabra["palabra"]);?></h2>
    
        
        
    <?php
    } 
    ?>
</div>