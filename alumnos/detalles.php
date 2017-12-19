<?php

            include './alumno.php';

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
                <td>Edad</td> 
                <td>Curso</td>  
            </tr>
                <?php 

                    if(isset($_GET["Nie"])) {
                        
                         echo "<h1>Datos del alumno con DNI: ".$_GET['Nie'];

                        $nie=$_GET['Nie'];
                        $alumnos=Alumno::getAlumnos()[$nie];
                       
                             echo '<tr>';
                             echo '<td>'. $alumnos-> getNie() . '</td>';
                             echo '<td>'. $alumnos-> NombreCompleto() .'</td>';
                             echo '<td>'. $alumnos-> getEdad() .'</td>';
                             echo '<td>'. $alumnos-> getCurso() .'</td>';
                             echo '</tr>';
                    }

                    else {
                        
                         echo "Alumno no encontrado";
                    } 
                ?>
        </table>

    </div>
</body>
</html>