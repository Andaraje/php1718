<?php
        include './modelo/Pieza.php';
        $coche = $_GET["a"];
        session_start();   
        $Piezas = (isset($_SESSION["Piezas"])) ? 
        $_SESSION["Piezas"] : Pieza::getPiezas() ;     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de piezas</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>IdPieza</td>
            <td>Descripcion</td>
            <td>Categoria</td>
            <td>id Coche</td>
            <td>Stock</td>
            <td>Precio</td>
        </tr>
        <?php
        foreach ($Piezas as $key => $piezas) {
            foreach ($piezas as $pieza) {
                $p = $pieza->getIdcoche();
                if(isset($p == $_GET["b"]))
                {
                    //imprimir la pieza
                }
            }
            
        }
            
        ?>
    </table>
</body>
</html>