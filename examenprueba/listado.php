<?php
    include './modelo/Agricultor.php';
    include './modelo/EntradaAceituna.php';
    session_start();
    $Agricultores = Agricultor::getAgricultores();
    if(!isset($_COOKIE["fran"])){
        $_SESSION["login"]="";
        header ("location: login.php");
    }else{
        setcookie("fran", "fran", time() + 60);        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LISTADOS</title>
</head>
<body>
    <table border="1">
        <thead>
        <tr>
            <td>NºSocio</td>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Contraseña</td>
            <td>Entradas</td>
        </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($Agricultores as $llave => $objeto) {
                    echo "<tr>";
                    foreach ($objeto as $key => $value) {
                        echo "<td> $value </td>";
                    }
                    echo "<td> <a href='entrada.php?a=$llave'> Entradas </a> </td>";
                }
                echo "</tr>";
            ?>
        </tbody>
    </table>
    <a href="gestion.php">volver a gestion</a>

</body>
</html>