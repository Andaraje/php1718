<?php
include './Modelo/categoria.php';
include './Modelo/Producto.php';
//indicamos que vamos a trabajar con sesiones
session_start();
//Comprobar si estoy logueado
if(!isset($_SESSION["login"]))
{
    header("Location:login.php");
}

//Compruebo si ya existe variable de sesion
$productos = (isset($_SESSION["productos"])) ? 
$_SESSION["productos"] : Producto::getProductos() ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilos.css">
    
</head>
<body>
<header>
    <div id="imagen">
        <img src="./imagenes/ferrete.png" alt="ferreteria">
    </div>
    <div id="titulo">
        <p>Ferreteria la churra</p>
    </div>
</header>
<nav>
    <ul>
        <?php
            foreach (Categoria::getCategorias() as $cat) {
                echo "<li><a href='gestion.php?cc=".
                "{$cat->getCodigo()}'>".
                $cat->getCategoria()."</a></li>";
            }
        ?>
        <li>
            <a href='mantenimiento.php'>Mantenimiento productos</a>
        </li>
    </ul>
</nav>
<div id="cuerpo">
<h1>Mantenimiento de Productos</h1>
<a href="nuevo.php"><h3>Nuevo producto</h3></a>
<table border="1">
    <th>Código</th>
    <th>Descripción</th>
    <th>Acciones</th>
<?php
   foreach ($productos as $cat => $productoscategoria) {
       foreach($productoscategoria as $producto){
       echo "<tr>";
       echo "<td>{$producto->getCodigo()}</td>";
       echo "<td>{$producto->getDescripcion()}</td>";
       echo "<td><a href='detalle.php?
       cod={$producto->getCodigo()}&cat={$cat}'>detalle</a></td>";
        echo "<td><a href='./borrar.php?cod={$producto->getCodigo()}&cat={$cat}'>Borrar</a></td>";
        echo "</tr>";
       }
   } 
?>
</table>
</div>   
<footer>&copy;-2017 Desarrollo de Software 2DAA</footer>
</body>
</html>