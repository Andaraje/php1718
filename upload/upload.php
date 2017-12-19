<?php
$imagen=null;
    if($_FILES){
        $origen=$_FILES["fichero"]["tmp_name"];
        //$destino="./subidos/".$_FILES["fichero"]["name"];
        //move_uploaded_file($origen, $destino);
        $datos=file_get_contents($origen);
        $imagen=base64_encode($datos);
    }
    var_dump($_FILES);
?>
<form action="" method="post" enctype="multipart/form-data">
    Subir Archivo <input type="file" name="fichero">
    <br>
    <input type="submit" value="Subir">
</form>
<img src="data:image/jpg;base64,<?=$imagen?>" title="joder">
