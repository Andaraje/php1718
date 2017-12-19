<?php
    include './modelo/Coche.php';
    include './modelo/Pieza.php';
    session_start();
    $Coches = Coche::getCoches();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHOLLO S.A</title>
</head>
<body>
    <h1>Bienvenido a CHOLLO S.A</h1><br>
        <a href="buscar.php">Buscar pieza por Id</a>
        
    <table border="1">
        <tr>
            <td>ID coche</td>
            <td>Marca</td>
            <td>Modelo</td>
            <td>Combustible</td>
            <td>Año</td>
            <td>Observaciones</td>
            <td>Piezas</td>
        </tr>
        <?php 
                foreach ($Coches as $llave => $objeto) {
                    echo "<tr>";
                    foreach ($objeto as $key => $value) {
                        echo "<td> $value </td>";
                    }
                    echo "<td> <a href='piezasp.php?a=$llave'> Piezas </a> </td>";
                }
                echo "</tr>";
            ?>
    </table>

    <a href="altap.php"> Dar de alta piezas...</a>
</body>
</html>