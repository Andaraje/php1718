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

    foreach ($productos[$_GET["cat"]] as $producto) {

            if($_GET["cod"]==$producto->getCodigo()){

                echo "Descripción: ".$producto->getDescripcion()."<br>";
            echo "precio: ".$producto->getPrecio()."<br>";
            echo "stock: ".$producto->getStock()."<br>";
            }
        

        
    }


}
?>
</div>   
<footer>&copy;-2017 Desarrollo de Software 2DAA</footer>
</body>
</html>