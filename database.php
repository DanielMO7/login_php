<?php 
	$server = 'localhost:3307';
	$username= 'root';
	$password= '';
	$database= 'notas_colegio';

	try{
		$conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
	} catch (PDOException $e) {
		die('Conexion Fallida: '.$e->getMessage());
	}

 ?>