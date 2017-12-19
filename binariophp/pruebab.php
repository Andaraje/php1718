<?php
//crear archivo
$f=fopen("prueba.bin", "wt");
fwrite($f, "primera linea\n");
fwrite($f, "segunda Linea");
fclose($f);

//leer archivo

$f=fopen("prueba.bin", "r");
while($linea=fgets($f))
{
    echo $linea;
}
fclose($f);

//json codifica decodifica
//coger valores del archivo json
$datos=file_get_contents("niveles.json");
//descodificar de json
$niveles=json_decode($datos);
var_dump($niveles);
echo $niveles->nivel2[1];
//escribir valores en el json
$niveles->nivel2[1]=40;
//grabar los valores en el json
file_put_contents("niveles.json", json_encode($niveles));
//trabajar con directorios
$d=opendir("c:/wamp");
while($lectura=readdir($d))
{
    if(is_dir($lectura))
    {
        echo $lectura. "es un directorio <br>";
    }else{
        echo $lectura. " es un fichero <br>";
    }
}
closedir($d);
?>