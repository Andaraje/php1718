<?php
session_start();

require('usuario.php');
require('modelo.php');

if (isset ($_GET['action'])){
    $action = $_GET['action'];
 
	switch($action){
	
		case "login":{
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			login($user, $pass);
			if($_SESSION['logueado']==true){
				require('vista3.php');
			}
			break;
		}
		
		case "recordar":{
			$email=$_POST['email'];
			recordar($email);
			break;
		}
		
		default:
		break;
	}
}
if($_SESSION['logueado']==false){
	require('vista.php');
}
?>
