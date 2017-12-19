<?php
    include './modelo/Agricultor.php';
    include './modelo/EntradaAceituna.php';
    session_start();
    $Agricultores = Agricultor::getAgricultores();
    $Entradas = (isset($_SESSION["Entradas"])) ? 
    $_SESSION["Entradas"] : EntradaAceituna::getEntradas() ;
    if(!isset($_COOKIE["fran"])){
        $_SESSION["login"]="";
        header ("location: login.php");
    }else{
        setcookie("fran", "fran", time() + 60);        
    }
    $socio;
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion</title>
</head>
<body>
    <?php
    if (isset($_SESSION["login"]))
    {
        foreach ($_SESSION["login"] as $key) {
            echo "Bienvenido " . $key;
            $socio = $key;
            break;
        }
        echo "<br>";
        echo "<a href='cerrarsesion.php'>Cerrar Sesion</a>";
    }
     ?>
     <a href="listado.php">ir a listados</a>
    <h1>Crear entrada de aceituna</h1>
    <form action="" method="post">
        <fieldset>
            NºSocio <input type="text" id="nsocio" disabled value="<?php echo $socio; ?>" name="nsocio" ><br>
            Id parcela <input type="text" name="id" id="id"><br>
            Fecha entrada <input type="date" name="fecha" id="fecha"><br>
            Kilos <input type="number" min="1" max="50000" name="kilos"><br>
            <input type="submit" value="Entregar">
        </fieldset>
    </form>
    <?php
        $expReg = "/^\w{3}\d{3}$/";
        if(count($_POST)>0){
            //validamos la fecha antes de los kilos y la expresion regular
            $fecha = (explode('-', $str, 3));
            $fecha[0] = $anio;
            echo $anio;
            if( preg_match($expReg, $_POST['id']) && $_POST["kilos"]<=50000){
                
                $entrada = new EntradaAceituna($socio, $_POST["id"], $_POST["fecha"], $_POST["kilos"]);
                foreach ($entrada as $key => $value) {
                    echo $value . " - ";
                }
                
                $Entradas[$socio][]=$entrada;
                $_SESSION["Entradas"]=$Entradas;
                
            }else{
                echo "El numero de parcela debe ser 3 letras acompañadas de 3 numeros ej. aaa111";
            }
            
        }
    ?>
    
</body>
</html>