<?php
session_start();
include "path/to/UserData.php";

$loggedInUser = UserData::getById($_SESSION['user_id']); // Obtén el usuario actualmente autenticado

if (!$loggedInUser) {
    header("Location: login.php");
    exit;
}

if ($loggedInUser->is_admin != 2) {
    header("Location: index.php");
    exit;
}

// Aquí continúa el código de la página de citas
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Citas</title>
    <!-- Incluye aquí tus estilos y scripts -->
</head>
<body>
    <h1>Mis Citas</h1>
    <!-- Código para mostrar las citas del paciente -->
</body>
</html>
