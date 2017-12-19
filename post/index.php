<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        /* Variable entera con valor entre 1 y 10, imprimir una tabla con tantas filas
        como valor tiene la variable*/

        $columna=$_POST['txtcolumna'];
        $fila=$_POST['txtfila'];
    ?>
        <html>
            <body>
                <table border="1">
    <?php
        for ($i=0; $i < $columna; $i++) { 
            echo "   <tr>
                     </tr>";
                for ($j=1; $j <= $fila; $j++) { 
                    echo " <td>fila
                            </td>";
                }
        }
        ?>
                 </table>
            </body>
        </html>
</body>
</html>