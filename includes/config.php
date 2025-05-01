<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Cambia si es necesario
define('DB_PASS', ''); // Cambia si tienes contraseña
define('DB_NAME', 'login_system');

try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa!"; // Mensaje temporal para pruebas
} catch(PDOException $e) {
    die("ERROR: No se pudo conectar. " . $e->getMessage());
}
?>