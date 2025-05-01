<?php
require_once '../includes/auth.php';
redirectIfNotLoggedIn();

if ($_SESSION['user_rol'] !== 'Administrador' && $_SESSION['user_rol'] !== 'Docente') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Empresa</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Registro de Empresa</h1>
        <p>hola Registro de empresa</p>
        <p><a href="dashboard.php">Volver al panel</a></p>
    </div>
</body>
</html>