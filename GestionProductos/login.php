<?php
    include './Modelo/categoria.php';
    include './Modelo/usuario.php';
    session_start();
    //Recogemos los datos y comprobamos
    if(isset($_POST["usu"]) && isset($_POST["pswd"]))
    {
        $usuarios=Usuario::getUsuarios();
        //Compruebo si existe usuario
        if(isset($usuarios[$_POST["pswd"]]))
        {
            //Creo variable de sesion de login
            $_SESSION["login"]=$usuarios[$_POST["pswd"]];
            header("Location:gestion.php");
            
            
        }
    }
?>
<?php
    include_once ('cabecera.php');
?>
<form action="" method="post">
<fieldset>
<legend>Login</legend>
Usuario: <input type="text" name="usu">
<br>
Contraseña: <input type="password" name="pswd">
<br>
<input type="submit" value="Enviar">
</fieldset>
</form>

</div>   
<footer>&copy;-2017 Desarrollo de Software 2DAA</footer>
</body>
</html>