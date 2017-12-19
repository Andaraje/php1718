<?php
    $conexion = new PDO('mysql:dbname=northwind;host=127.0.0.1', "root", "");

    //$var="categoria";
    $var="' or '1'='1";

    /*$stm=$conexion->query("SELECT * FROM categories WHERE CategoryName='$var'");
    $datos=$stm->fetchAll();
    var_dump($datos); 
    
    
    bindParam=sirve para enlazar un parametro o variable con un parametro de la consulta
    
    
    
    */
    //preparacion de consultas y paramentros
    $namecat="categoria";
    $stm=$conexion->prepare("SELECT * FROM categories where CategoryName=:cat");
    //                      VARIABLE  filtro para que sea string, distancia
    $stm->bindParam(":cat", $namecat, PDO::PARAM_STR, 25);
    $stm->execute();        //ejecuta
    $datos=$stm->fetchAll();//guardo en la variable datos en forma de array
    var_dump($datos);//imprimo

    //en esta segunda consulta no hace falta volver a hacer la consulta (prepare)
    $namecat="Meat/Poultry";
    $stm->execute();
    $datos=$stm->fetchAll();
    var_dump($datos);
?>