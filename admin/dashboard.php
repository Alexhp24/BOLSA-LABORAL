<?php
require_once '../includes/auth.php';
redirectIfNotLoggedIn();

if ($_SESSION['user_rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Bienvenido, <?php echo $_SESSION['username']; ?> (Administrador)</h1>
        
        <nav>
            <ul>
                <li><a href="seguridad.php">Seguridad</a></li>
                <li><a href="registro_empresa.php">Registro de Empresa</a></li>
                <li><a href="gestion_documentos.php">Gestión de Documentos</a></li>
                <li><a href="categorias.php">Categorías</a></li>
                <li><a href="ofertas_laborales.php">Ofertas Laborales</a></li>
                <li><a href="postulaciones.php">Postulaciones</a></li>
                <li><a href="../logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>