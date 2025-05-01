<?php
require_once '../includes/auth.php';
redirectIfNotLoggedIn();

if ($_SESSION['user_rol'] !== 'Estudiante') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Estudiante</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Bienvenido, <?php echo $_SESSION['username']; ?> (Estudiante)</h1>
        
        <nav>
            <ul>
                <li><a href="ofertas_laborales.php">Ofertas Laborales</a></li>
                <li><a href="postulaciones.php">Postulaciones</a></li>
                <li><a href="../logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>