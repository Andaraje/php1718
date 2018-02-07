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
    $datos=array_reverse($bd->Leer("linea"));
    //$reversed = array_reverse($datos);
    foreach ($datos as $key => $value) {
            echo "<div class='media'>";
            echo "<div class='media-heading'>".$datos[$key]['usuario']."</div>";
            echo "<div class='media-body'>".$datos[$key]['fecha']."</div>";
            echo "<div class='media-body'>".$datos[$key]['mensaje']."</div>";
            echo "<span class='".$datos[$key]['idlinea']."'</span>";
            echo "</div>";
    }
}
if(isset($_GET["z"]))
{
    $datos=$bd->LeerUltimo("linea");
    $ultimo;
    foreach ($datos as $key => $value) {
        $ultimo=$datos[$key]["id"];
    }
}



?>