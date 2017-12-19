<?php
        include './modelo/Pieza.php';
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
    <title>Busqueda por Id</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="b">
        <input type="submit" value="Enviar">
    </form>
    <table border="1">
        <tr>
            <td>Id Pieza</td>
            <td>Descripcion</td>
            <td>Categoria</td>
            <td>Idcoche</td>
            <td>Stock</td>
            <td>Precio</td>
        </tr>
    <?php
    if(count($_GET)>0)
    {
        if(isset($Piezas[$_GET["b"]]))
        {
            echo "<tr>";
            foreach ($Piezas[$_GET["b"]] as $key => $value) {
                
                echo "<td>" . $value . "</td>";
                
            }
            echo "</tr>";
        }else{
            echo "Este coche no tiene piezas";
        }
            
    }
    
        
            
        ?>
        </table>
</body>
</html>