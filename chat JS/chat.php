<?php
include_once "BD.php";

$bd=new BD("127.0.0.1","chat","root");
if(isset($_GET["x"])){
    $todo = json_decode($_GET["x"]);
    $fecha= getDate()['year']."-". getDate()['mon'] ."-".getDate()['mday'];
    $nombrevalores=["usuario"=>$todo->usuario, "mensaje"=>$todo->mensaje,"fecha"=>$fecha];
    $bd->Crear("linea", $nombrevalores);
    echo "OK"; 
}
if(isset($_GET["y"]))
{
    $datos=$bd->Leer("linea");
    foreach ($datos as $key => $value) {
            echo "<div class='mensaje'>";
            echo "<div class='usuario'>".$datos[$key]['usuario']."</div>";
            echo "<div class='fecha'>".$datos[$key]['fecha']."</div>";
            echo "<div class='texto'>".$datos[$key]['mensaje']."</div>";
            echo "</div>";
    }
}



?>