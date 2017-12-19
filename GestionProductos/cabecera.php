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
            echo "<li><a href='gestion.php?cc=" .
                "{$cat->getCodigo()}'>" .
                $cat->getCategoria() . "</a></li>";
        }
        ?>
        <li>
            <a href='mantenimiento.php'>Mantenimiento productos</a>
        </li>
    </ul>
    <div id="cerrarsesion">
    <?php
    if (isset($_SESSION["login"]))
    {
        echo "<ul><li>Bienvenido ".
        $_SESSION["login"]->getUsuario();
        echo "<a href='cerrarsesion.php'> Cerrar Sesión</a></ul></li> ";
    }
    ?>
    </div>
</nav>
<div id="cuerpo">