<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
	</head>
	<body>
		<div id="container">
			<form action="index.php?action=login" method="post" name="logueo">
				<fieldset>
					<legend>Login</legend>
						<table>
							<tr>
								<td ><label>User: </label></td>
								<td><input type="text" name="user"></td>
							</tr>
							<tr>
								<td ><label>Pass: </label></td>
								<td><input type="text" name="pass"></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="login" value="Login"></td>
							</tr>
							<tr>
								<td colspan="2"><?php if($_SESSION['logueado']==false){echo "Usuario o Login Incorrecto.";}?></td>
							</tr>
							<tr>
								<td colspan="2"><a href="vista2.php"> Recordar </a></td>
							</tr>
						</table>
				</fieldset>
			</form>
		</div>
	</body>
</html>

