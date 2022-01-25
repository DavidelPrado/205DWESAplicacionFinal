<?php
    /*
    * @author: David del Prado Losada
    * @since: 02/01/2022
    * @version: v1.0
    * 
    * Ventana con el formulario de login
    */
?>
<h1>Login</h1>
<form method="post">
    <fieldset>
        <label>Usuario:</label><br>
        <input type='text' name='usuario'/><br><br>

        <label>Contraseña:</label><br>
        <input type='password' name='password'/>
        <br><br>
        <input type='submit' name='login' value='Login'/>
        <input type='submit' name='cancelar' value='Cancelar'/>
    </fieldset>
</form>