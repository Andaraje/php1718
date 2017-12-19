<?php
    session_start();
    if(!isset($_SESSION["contador"])){
        $_SESSION["contador"]=0;
    }
?>
<?php

    if(isset($_POST['sumar']))
    {
        $_SESSION["contador"]++;
    }
    if(isset($_POST['restar']))
    {
        $_SESSION["contador"]--;
    }
    if(isset($_POST['reset']))
    {
        $_SESSION["contador"]=0;
    }
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
<div>
        <form action="#" method="post">
            <h2>Ejercicio sesion</h2>
            <fieldset style="width:250px" align="center">
                <input type="submit" name="sumar" value="+">
                <input type="text" disabled=true size="1" maxlength="3" name="numero" value="<?php echo $_SESSION["contador"]?>">
                <input type="submit" name="restar" value="-">
                <br><br>
                <input type="submit" name="reset" value="Reset">
            </fieldset>
        </form>
    </div> 
</body>
</html>