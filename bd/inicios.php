<?php
include_once './categories.php';
//crear conexion
try{
    $conexion = new PDO('mysql:dbname=northwind;host=127.0.0.1', "root", "");
    echo "conexion realizada";
    //consulta a la bd
    $stm=$conexion->query("select * from categories");
    //forma en que se pasan los valores en este caso, array indexado
    
    $conexion->exec('INSERT INTO categories (CategoryID, CategoryName, Description) VALUES (9, "categoria", "una categoria")');
    $datos=$stm->fetchAll(PDO::FETCH_CLASS, "Categories");
    //imprimir valores

    echo "<table border='1'>";
    echo "<tr> <td> ID </td> <td>Nombre</td> <td>Descripcion</td> </tr>";
    foreach($datos as $categoria)
    {
        echo "<tr>";
        echo "<td>$categoria->CategoryID</td>";
        echo "<td>$categoria->CategoryName</td>";
        echo "<td>$categoria->Description</td>";
    }
    echo "</table>";
}catch(PDOException $e){
    echo "se ha producido un error en la bd" . $e->getMessage();
}

?>