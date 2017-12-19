<?php
    //ejercicio para probar clase validacion de Antonio
    include './Helper/validacion.php';
    $NormasValidacion=["dni"=>["requerido"=>TRUE,
    "patron"=>"/^(\d{8})(\w)$/"],
    "descripcion"=>["requerido"=>TRUE,"max_longitud"=>10]];
    $Validacion = new Validacion();
    if(count($_POST)>0)
    {
        $Validacion->ValidaDNI($_POST['dni'], $_POST['dni'], "/^(\d{8})(\w)$/");
        if($Validacion->ValidacionPasada())
        {
            echo "<script>alert('Datos validos');</script>";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validar dni</title>
</head>
<body>
    <h1>Validar Dni</h1>
    <form action="" method="post">
        <legend>Validar dni</legend>
        <fieldset>
           DNI: <input type="text" name="dni">
           <input type="submit" value="Enviar">
        </fieldset>
    </form>
</body>
</html>