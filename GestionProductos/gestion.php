<?php
include './Modelo/categoria.php';
include './Modelo/Producto.php';
include './Modelo/usuario.php';
//indicamos que vamos a trabajar con sesiones
session_start();
//Compruebo si ya existe variable de sesion
$productos = (isset($_SESSION["productos"])) ?
    $_SESSION["productos"] : Producto::getProductos();
if(isset($_COOKIE["contador"])){
     setcookie("contador", $_COOKIE["contador"]+1, time() + (3600 * 24));
    if ($_COOKIE["contador"]==3){
        echo "<script lenguage='text/javascript'> alert('Parece que utilizas mucho nuestra página, prueba a descargar nuestra app') </script>";
    }
}else{
      setcookie("contador", $_COOKIE["contador"] = 0, time() + (3600 * 24));
}
?>
<?php
    include_once ('cabecera.php');
?>

<?php
//Tenemos o no tenemos categoria elegida
if (!isset($_GET["cc"])) {
    echo "<div id='principal'><p>FERRETERIA LA CHURRA</p>
    <p>Encuentra todo lo que necesites para tu empresa o bricolaje</p></div>";
}
else
    {
    echo "<div id='titulo'>Productos de la categoria " .
        Categoria::getCategoriaId($_GET["cc"]) . "</div>";//Deberiamos obtener el nombre categoria
    echo "<section>";
    foreach ($productos[$_GET["cc"]]
        as $producto) {
        echo "<article>";
        echo "<h3>Producto</h3>";

        echo "<p>{$producto->getDescripcion()}</p>";
        echo "<h3>Precio</h3>";
        echo "<p>{$producto->getPrecio()} &euro;</p>";
        echo "<h3>Stock</h3>";
        echo "<p>{$producto->getStock()} paquetes</p>";
        echo "</article>";
    }
    echo "</section>";
}
?>
</div>   
<footer>&copy;-2017 Desarrollo de Software 2DAA</footer>
</body>
</html>