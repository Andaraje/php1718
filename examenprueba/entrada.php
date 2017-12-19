<?php
    include './modelo/EntradaAceituna.php';
    $socio = $_GET["a"];
    session_start();
    $Entradas = (isset($_SESSION["Entradas"])) ? 
    $_SESSION["Entradas"] : EntradaAceituna::getEntradas() ;
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
    <title>Entradas</title>
</head>
<body>
    <?php
        echo "<h1> El agricultor " . $socio . " ha realizado las siguientes entradas </h1>";
    ?>
    <table border="1">
        <tr>
            <td>NºSocio</td>
            <td>ID parcela</td>
            <td>Fecha</td>
            <td>Kilos</td>
        </tr>
        <?php
        if(isset($Entradas[$_GET["a"]])){
            foreach ($Entradas[$_GET["a"]] as $key) {
                echo "<tr>";
                echo "<td>" . $key->getSocio() . "</td>";
                echo "<td>" . $key->getParcela() . "</td>";
                echo "<td>" . $key->getFecha() . "</td>";
                echo "<td>" . $key->getKilos() . "</td>";
                echo "</tr>";
            }
        }else{
            echo "<p> Este usuario no tiene entradas aún </p>";
        }
            
        ?>
    </table>
    <a href="listado.php">Volver a listado</a><br>
    <a href="gestion.php">volver a gestion</a>
</body>
</html>