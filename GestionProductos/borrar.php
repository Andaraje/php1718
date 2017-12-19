<?php
include './Modelo/categoria.php';
include './Modelo/Producto.php';
//indicamos que vamos a trabajar con sesiones
session_start();
//Compruebo si ya existe variable de sesion
$productos = (isset($_SESSION["productos"])) ? 
$_SESSION["productos"] : Producto::getProductos() ;

?>

<?php
    include_once ('cabecera.php');
?>
<?php

if((isset($_GET["cod"])) && (isset($_GET["cat"]))){
    $i=0;
    foreach ($productos[$_GET["cat"]] as $producto) {

            if($_GET["cod"]==$producto->getCodigo()){
                unset($productos[$_GET["cat"]][$i]);
                $productos[$_GET["cat"]]=
                array_values($productos[$_GET["cat"]]);
                echo "Ha sido borrado con exito";
                $_SESSION["productos"]=$productos;
            }
            $i++;
           
    }
}
?>
<a href='./mantenimiento.php'>Volver</a>
</div>   
<footer>&copy;-2017 Desarrollo de Software 2DAA</footer>
</body>
</html>