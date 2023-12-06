<?php

// Ruta del archivo JSON donde se almacenan los datos
$dataFilePath = '../data/data.js';

// Verifica si el archivo existe
if (file_exists($dataFilePath)) {
    // Lee el contenido del archivo JSON
    $jsonData = file_get_contents($dataFilePath);

    // Convierte el JSON a un array PHP
    $data = json_decode($jsonData, true);

    // Vacía el array (elimina todos los datos)
    $data = array();

    // Convierte el array PHP de nuevo a JSON
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    // Escribe el nuevo contenido en el archivo
    file_put_contents($dataFilePath, $jsonData);

    // Envía una respuesta de éxito
    echo 'success';
} else {
    // Si el archivo no existe, envía una respuesta de error
    echo 'error';
}

?>
