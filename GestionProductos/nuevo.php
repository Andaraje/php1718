<?php
include './Modelo/categoria.php';
include './Modelo/Producto.php';
//indicamos que vamos a trabajar con sesiones
session_start();
$codigo=null;
$descripcion=null;
$precio=null;
$stock=null;
$categoria=null;
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
            <a href='nuevo.php'>Nuevo producto</a>
        </li>
    </ul>
</nav>
<div id="cuerpo">
<?php
//Comprobamos si hemos pulsado enviar
if(count($_POST)>0)
{
    $errores;
    $codigo = $_POST["codigo"];
    $descripcion = $_POST["descripcion"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];  
    $categoria = $_POST["categoria"];      
    //Cogemos datos y creamos producto
    if(empty($codigo))
    {
       $errores["codigo"]="el codigo no es vaálido";
    }
    if(strlen($descripcion)<5 || strlen($descripcion)>20){
        $errores["descripcion"]="La descripcion no es correcta";
    }
    if(count>($errores)==0){
        $producto=new Producto($_POST["codigo"],$_POST["descripcion"],$_POST["stock"],
        $_POST["precio"],$_POST["categoria"]);
        //$productos=Producto::getProductos();
        $productos[$_POST["categoria"]][]=$producto;
        //Actualizo o creo la variable de sesion
        $_SESSION["productos"]=$productos;
        //Listado
        header ("location: mantenimiento.php");
    }
     
}
?>
<h1>Nuevo Producto</h1>
<form action="" method="post" novalidate>
<fieldset>
<legend>Producto:</legend>
Código: <input type="text" name="codigo" id="" value ="<?php echo $codigo ?>" required <?php echo isset($errores["codigo"])?"class='input_error'":""?> >
<?php echo isset($errores["codigo"])?"<span>{$errores['codigo']}</span>":""?>
<br>
Descripción: <input type="text" name="descripcion" value ="<?php echo $descripcion ?>" id="" required minlength="5" maxlength="20">
<br>
Precio: <input type="number" name="precio" value ="<?php echo $precio ?>" id="" required>
<br>
Stock <input type="number" name="stock" value ="<?php echo $stock ?>" id="" required>
<br>
Categoría:
<select name="categoria" required>
<?php
foreach (Categoria::getCategorias() as $cat) {
    echo "<option value='{$cat->getCodigo()}'".
    ($cat->getCodigo()==$categoria?'selected':"") . ">{$cat->getCategoria()}</option>";
}
?>
</select>
</fieldset>
<br>
<input type="submit" value="Enviar">
</form>

</div>   

<footer>&copy;-2017 Desarrollo de Software 2DAA</footer>
</body>
</html>