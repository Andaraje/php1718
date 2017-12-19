<?php
include './modelo/Agricultor.php';
//Recogemos los datos y comprobamos
session_start();

if(isset($_POST["nsocio"]) && isset($_POST["pass"]))
{
    $agricultores = Agricultor::getAgricultores();
    //Compruebo si existe usuario
    if(isset($agricultores[$_POST["nsocio"]]))
    {
        $sosio = $agricultores[$_POST["nsocio"]];
        if($sosio->getPass()==$_POST["pass"]){
            //Creo variable de sesion de login
            $_SESSION["login"]=$agricultores[$_POST["nsocio"]];
            setcookie("fran", "fran", time() + 60);
            header("Location:gestion.php");
        }
        
        
        
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div>
        <form action="" method="post">
            <fieldset>
                Nº Socio : <input type="text" name="nsocio"><br>
               Password : <input type="password" name="pass">
               <input type="submit" value="Entrar">
            </fieldset>
        </form>
    </div>
    
</body>
</html>