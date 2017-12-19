<?php

            include './alumno.php';
            $Alumnos = alumno::getAlumnos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div id="Cabecera">

        <h1>GESTIÓN DE ALUMNOS</h1>

    </div>
    
    <div id="Cuerpo"> 

        <table border="1">

            <tr>   
                <td>NIE</td>
                <td>Nombre Completo</td> 
                <td>Detalles</td>   
            </tr>
                <?php foreach ($Alumnos as $key => $value) {
                    echo '<tr>';
                    echo '<td>'. $value-> getNie() . '</td>';
                    echo '<td>'. $value-> NombreCompleto() .'</td>';
                    echo '<td><a href="detalles.php?Nie='.$key.'">Detalles</a></td>';
                    echo '</tr>';
                }?>
        </table>

    </div>


</body>
</html>