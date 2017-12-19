<?php
include_once './modelo/repositoriopieza.php';
include_once './modelo/coche.php';
include_once './Helper/validacion.php';

RepositorioPieza::Iniciar();

$NormasValidacion=["ID"=>["requerido"=>TRUE,
"patron"=>"/^[0-9]{4}-[A-Z]{3}$/"],
"descripcion"=>["requerido"=>TRUE,"max_longitud"=>10]];
$Valida=new Validacion();
//POST
if(count($_POST)>0)
{
    
    $Valida->Valida($NormasValidacion);
    //$errores=$Valida->getErrores();
    if($Valida->ValidacionPasada())
    {
        echo "<script>alert('Datos validos');</script>";
    }
}
?>
<?php
include_once './shared/cabecera.php';
?>

<h1>Nueva Pieza</h1>
<form action="" method="post" novalidate>
<fieldset>
<legend>Pieza</legend>
ID: <input type="text" name="ID" pattern="[0-9]{4}-[A-Z]{3}"
 value="<?php echo $Valida->ImprimeValor('ID') ?>">
<?php echo $Valida->ImprimeError("ID")?>
<br>
Descripción: <input type="text" name="descripcion" required maxlength="50"
value="<?php echo $Valida->ImprimeValor('descripcion') ?>">
<?php echo $Valida->ImprimeError("descripcion")?>
<br>
Categoría: <input type="text" name="categoria" required maxlength="50">
<br>
<select name="idcoche" required>
    <option value="">Selecciona coche...</option>
    <?php
        foreach (Coche::getCoches() as $ID => $coche) {
            echo "<option value='$ID'>$ID</option>";
        }
    ?>
</select>
<br>
Stock: <input type="number" name="stock" required max="9999">
<br>
Precio: <input type="number" name="precio" required step=".01">
<br>


</fieldset>
<input type="submit" value="Grabar">
</form>

<?php
include_once './shared/pie.php';
?>