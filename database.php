<?php
$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'prueba';

try {
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
	die('Conexion Fallida: ' . $e->getMessage());
}
