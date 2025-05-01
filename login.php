<?php
require_once 'includes/auth.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Debug: Mostrar lo que se está recibiendo
    echo "Usuario recibido: " . htmlspecialchars($username) . "<br>";
    echo "Contraseña recibida: " . htmlspecialchars($password) . "<br>";
    
    if (loginUser($username, $password)) {
        redirectBasedOnRole();
    } else {
        $error = "Usuario o contraseña incorrectos";
        
        // Debug: Verificar si el usuario existe en la base de datos
        global $conn;
        $stmt = $conn->prepare("SELECT username FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "El usuario existe pero la contraseña no coincide";
        } else {
            echo "El usuario no existe en la base de datos";
        }
    }
}

redirectBasedOnRole();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
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
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>