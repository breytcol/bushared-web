<?php
session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] === 'cliente') {
    // Obtener información específica para clientes si es necesario
    echo 'Información del usuario para el cliente.';
} elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Obtener información específica para administradores si es necesario
    echo 'Información del usuario para el admin.';
} else {
    echo 'No tienes permisos para acceder a esta página.';
}
?>
