<?php
// Importar la conexion

$db = conectarDB();

// Crear un email y password
$nombre = "Ana";
$apellido = "Quesada";
$usuario = "Anatqv";
$email = "ana3@correo.com";
$password = "Ana2323.";
$rol = "Admin";
$passwordHash = password_hash($password, PASSWORD_DEFAULT);


// Query para crear el usuario
$query = " INSERT INTO administradores (nombre, apellido, usuario, email, password, rol) VALUES ('$nombre', '$apellido', '$usuario', '$email', '$passwordHash', '$rol')";


// Agregarlo a la base de datos
mysqli_query($db, $query);