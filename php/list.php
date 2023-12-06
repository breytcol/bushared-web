<?php
// Este archivo manejará las operaciones en la base de datos

// Ruta al archivo database.js
$databaseFilePath = 'js/database.js';

// Verifica si el archivo existe
if (file_exists($databaseFilePath)) {
    // Lee el contenido del archivo
    $databaseContent = file_get_contents($databaseFilePath);

    // Devuelve el contenido tal cual
    echo $databaseContent;
} else {
    // El archivo no existe
    echo json_encode(['error' => 'Database file not found']);
}
?>
