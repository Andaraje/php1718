<?php
include_once './categories.php';
    $conexion = new PDO('mysql:dbname=northwind;host=127.0.0.1', "root", "");
    $stm=$conexion->prepare("SELECT * FROM categories");
    $stm->execute();        //ejecuta
    $datos=$stm->fetchAll(PDO::FETCH_CLASS, "Categories");
    echo "<table border='1'>";
    echo "<tr> <td> ID </td> <td>Nombre</td> <td>Descripcion</td> </tr>";
    foreach($datos as $categoria)
    {
        echo "<tr>";
        echo "<td>$categoria->CategoryID</td>";
        echo "<td>$categoria->CategoryName</td>";
        echo "<td>$categoria->Description</td>";
        echo "<td><a href=productos.php?a=$categoria->CategoryID>Productos</td>";
    }
    echo "</table>"
?>