<?php
require_once 'config.php';

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function redirectIfNotLoggedIn() {
    if (!isLoggedIn()) {
        header("Location: ../login.php");
        exit();
    }
}

function redirectBasedOnRole() {
    if (isLoggedIn()) {
        switch ($_SESSION['user_rol']) {
            case 'Administrador':
                header("Location: admin/dashboard.php");
                break;
            case 'Docente':
                header("Location: docente/dashboard.php");
                break;
            case 'Estudiante':
                header("Location: estudiante/dashboard.php");
                break;
        }
        exit();
    }
}
?>