<?php
    include_once './categories.php';
    include_once  './products.php';
    $cat=$_GET["a"];
    $conexion = new PDO('mysql:dbname=northwind;host=127.0.0.1', "root", "");
    $stm=$conexion->prepare("SELECT * FROM products WHERE CategoryID=$cat;");
    $stm->execute();        //ejecuta
    $datos=$stm->fetchAll(PDO::FETCH_CLASS, "Products");
    echo "<table border='1'>";
    echo "<tr><td>Codigo P</td> <td>Nombre</td> <td>Categoria</td> </tr>";
    foreach($datos as $producto)
    {
        echo "<tr>";
        echo "<td>$producto->ProductID</td>";
        echo "<td>$producto->ProductName</td>";
        echo "<td>$producto->CategoryID</td>";
    }
    echo "</table>"
?>