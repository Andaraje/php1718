<h1>Estos son los datos recibidos</h1>

<?php

foreach ($_POST as $key => $value) {
    
    echo "Nombre de la variable:  $key y cuyo valor es $value";
    echo "<br>";
}

?>