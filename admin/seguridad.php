<?php
require_once '../includes/auth.php';
redirectIfNotLoggedIn();

if ($_SESSION['user_rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../includes/functions.php';
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $rol = $_POST['rol'];
    
    if (registerUser($username, $password, $rol)) {
        $success = "Usuario creado exitosamente";
    } else {
        $error = "Error al crear el usuario";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seguridad - Administrador</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Seguridad</h1>
        <p>Crear nuevos usuarios</p>
        
        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select id="rol" name="rol" required>
                    <option value="Administrador">Administrador</option>
                    <option value="Docente">Docente</option>
                    <option value="Estudiante">Estudiante</option>
                </select>
            </div>
            <button type="submit">Crear Usuario</button>
        </form>
        
        <p><a href="dashboard.php">Volver al panel</a></p>
    </div>
</body>
</html>