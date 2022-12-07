<?php
session_start();


require "database.php";

if (isset($_SESSION["user_id"])) {
	$records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = null;

	if (count($results) > 0) {
		$user = $results;
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>DM Shops</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
</head>

<body>

	<?php require 'parses/header.php' ?>

	<?php if (!empty($user)) : ?>
		<br>Bienvenido. <?php $user['email'] ?>
		<br>Estas logueado satisfactoriamente.
		<a href="desloguearse.php">Salir</a>
	<?php else : ?>
		<h1>Por favor logueate o registrate</h1>

		<a href="loguearse.php">Logearse</a> o
		<a href="registrarse.php">Registrarse</a>

	<?php endif; ?>

</body>

</html>