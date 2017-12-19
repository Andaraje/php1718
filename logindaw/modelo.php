<?php

$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("daw", $conexion);

function login($user, $pass){
	$Consulta = "SELECT * FROM user WHERE user='$user' and pass='$pass'";
	$Respuesta = mysql_query($Consulta) or die(mysql_error());
	$Total = mysql_num_rows($Respuesta);
	if($Total==1){
		$Campos = mysql_fetch_assoc($Respuesta);
		$_SESSION['usuario']=new usuario($user, $pass, $Campos['email']);
		$_SESSION['logueado']=true;
	}else{
		$_SESSION['logueado']=false;
	}
}

function recordar($email){
	$Consulta = "SELECT * FROM user WHERE email='$email'";
	$Respuesta = mysql_query($Consulta) or die(mysql_error());
	$Total = mysql_num_rows($Respuesta);
	if($Total==1){
		$Campos = mysql_fetch_assoc($Respuesta);
		$user=$Campos['user'];
		$pass=$Campos['pass']; 
		$titulo = 'Recuperar usuario';
		$mensaje = 'Sus datos en nuestra web son los siguientes, Usuario: ' . $user . ' Contrase&ntilde;a: ' . $pass . '';
		mail($email, $titulo, $mensaje);
	}
}

function modifica(){
	$producto=$_SESSION['producto'];
	$Consulta = "UPDATE productos SET nombreProducto='$producto->nombre', caracteristicasProducto='$producto->url' WHERE idProducto='$producto->id'";
	$Respuesta = mysql_query($Consulta) or die(mysql_error());
}

function recuperaCategoria(){
	$Consulta = "SELECT * FROM categorias";
	$Respuesta = mysql_query($Consulta) or die(mysql_error());
	$i=0;
	while ($Row = mysql_fetch_assoc($Respuesta)) {
		$id=$Row['idCategoria'];
		$nombre=$Row['nombreCategoria'];
		$categoria=new categoria($id, $nombre);
		$arrayCategoria[$i]=$categoria;
		$i++;
	}
	return $arrayCategoria;
}
?>