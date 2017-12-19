<?php
    //en esta pagina se dará de alta a las piezas mediante un formulario POST
    include './modelo/Coche.php';
    include './modelo/Pieza.php';
    session_start();
    $Coches = Coche::getCoches();
    $Piezas = (isset($_SESSION["Piezas"])) ? 
    $_SESSION["Piezas"] : Pieza::getPiezas() ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Altas</title>
</head>
<body>
    <a href="index.php"> Volver a Index </a>
    <br>
    <form action="" method="post">
        <fieldset>
            ID Pieza : <input type="text" name="id" id="id" required><br>
            Descripcion : <input type="text" name="des" id="des" required><br>
            Categoria : <input type="text" name="cat" id="cat" required><br>
            ID Coche : <select name="idcoche" id=""><br>
                    <?php
                        foreach ($Coches as $llave => $objeto) {
                            echo "<option>";
                            foreach ($objeto as $key => $value) {
                                echo "<td> $value </td>";
                                break;
                                //El break es solo para recorrer el primer valor del objeto, en este caso el id
                            }
                            echo "</option>";
                        }
                    ?>
            </select>
            Stock : <input type="number" name="stock" id="stock" required><br>
            Precio : <input type="number" name="precio" id="precio" required><br>
            <input type="submit" value="Alta">
        </fieldset>
    </form>
    <?php
        //en este punto validaremos y crearemos un objeto pieza mediante el formulario
        $expRegID = "/^\d{4}[-]\w{3}$/";
        if(count($_POST)>0)
        {
            if(preg_match($expRegID, $_POST["id"]))
            {
                $pieza = new Pieza ($_POST["id"], $_POST["des"], $_POST["cat"], $_POST["idcoche"], $_POST["stock"], $_POST["precio"]);
                //añadimos el objeto al array y actualizamos variable de session
                $Piezas[$_POST["idcoche"]][]=$pieza;
                $_SESSION["Piezas"]=$Piezas;
            }
        }
        
    ?>
</body>
</html>