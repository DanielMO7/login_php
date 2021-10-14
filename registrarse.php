<?php 
	
	require 'database.php';

	$message= "";

	if (!empty($_POST['email']) && !empty($_POST['password'])) {

		$sql="INSERT INTO users(email, password) VALUES(:email, :password)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':email',$_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':password',$password);

		if ($stmt->execute()) {
			$message = "Ha sido creado un usuario satisfactoriamente";
		} else {
			$message = 'Sorry ha ocurrido un error creando su contraseña';
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registrarse</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
</head>
<body>
		<?php require 'parses/header.php' ?>

		<?php if (!empty($message)): ?>
			<p><?= $message ?></p>
		<?php endif; ?>	

		<h1>Registrarse</h1>
		<span> o <a href="loguearse.php">Loguearse</a></span>
		<form action="index.php" method="post"></form>

		<form action="registrarse.php" method="post">
		<input type="text" name="email" placeholder="Ingrese su email">
		<input type="password" name="password" placeholder="Ingrese su contraseña">
		<input type="password" name="confirm_password" placeholder="Confirme su contraseña">
		<input type="submit" value="Enviar">
</body>
</html>