<?php
//crear una cookie

if(isset($_COOKIE["contador"])){
    setcookie("contador", $_COOKIE["contador"]+1, time() + (3600 * 24));
    if ($_COOKIE["contador"]>=3){
        echo "<script lenguage='text/javascript'> alert('Parece que utilizas mucho nuestra página, prueba a descargar nuestra app') </script>";
    }
}else{
    setcookie("contador", $_COOKIE["contador"] = 0, time() + (3600 * 24));
}

?>