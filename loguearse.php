<?php 
	session_start();
	
	if (isset($_SESSION['user_id'])) {
		header('Location: /php-login-tienda');
	}

	require "database.php";

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
		$records->bindParam(':email', $_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = "";

		if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) { $_SESSION['user_id'] = $results['id'];
			header('Location: /php-login-tienda');
		} else{
			$message = 'Lo sentimos, estas credenciales no coinciden.';
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
</head>
<body>

	<?php require 'parses/header.php' ?>

	<h1>Loguearse</h1>
	<span> o <a href="registrarse.php">Registrarse</a></span>

	<?php if (!empty($message)) : ?>

	<p><?= $message ?></p>	
	<?php endif; ?>	
	
	<form action="loguearse.php" method="post">
		<input type="text" name="email" placeholder="Ingrese su email">
		<input type="password" name="password" placeholder="Ingrese su contraseña">
		<input type="submit" value="Enviar">
	</form>
</body>
</html>