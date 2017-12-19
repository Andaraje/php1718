<?php

			include './productos.php';
			include './categoria.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css"/>
    <title>Document</title>
</head>
<body>
    <header>
    	
    	<h1>Ejercicio Página Web PHP</h1>

    </header>

    <section>
    	
    	<aside>

			<h2>LISTA DE CATEGORÍAS DE BEBIDAS</h2>
    		
    		<ul>

				<?php foreach (categoria::getCategorias() as $key => $value) {

                    echo '<li><a href="index.php?Id=' . $key . '">' . $value->getNombre() . '</a></li>';
                }

				?>
    		</ul>

        </aside>

        <article>
        
                <?php

                    if(isset($_GET["Id"])) {
                        
                        echo "<h1>Datos del producto con ID: ".$_GET['Id'];

                        $id=$_GET['Id'];
                        $productos=producto::getProductos()[$id];
                        
                        echo '<table border="1">';
                        echo '<br><br><br>';
                        echo '<tr>';
                        echo '<td>MARCA</td>';
                        echo '<td>STOCK</td>';
                        echo '<td>PRECIO</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>'. $productos-> getMarca() . '</td>';
                        echo '<td>'. $productos-> getStock() . '</td>';
                        echo '<td>'. $productos-> getPrecio() .'€</td>';
                        echo '</tr>';
                        echo '</table>';
                    }
                ?>
        
        </article>

    </section>
</body>
</html>