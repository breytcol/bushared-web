<?php
session_start();

if ($_SESSION['role'] === 'admin' && isset($_POST['id']) && isset($_POST['title']) && isset($_POST['link'])) {
    $data = json_decode(file_get_contents('../js/data.js'), true);

    $idToUpdate = $_POST['id'];

    // Encuentra el índice del elemento a actualizar
    $indexToUpdate = -1;
    foreach ($data as $index => $item) {
        if ($item['id'] === $idToUpdate) {
            $indexToUpdate = $index;
            break;
        }
    }

    if ($indexToUpdate !== -1) {
        // Actualiza los campos necesarios
        $data[$indexToUpdate]['title'] = $_POST['title'];
        $data[$indexToUpdate]['link'] = $_POST['link'];

        // Guarda los cambios en el archivo JSON
        $success = file_put_contents('../js/data.js', json_encode($data));

        if ($success !== false) {
            $response = array("success" => "Cambios guardados correctamente");
            echo json_encode($response);
        } else {
            $response = array("error" => "Error al guardar los cambios");
            echo json_encode($response);
        }
    } else {
        $response = array("error" => "Elemento no encontrado");
        echo json_encode($response);
    }
} else {
    $response = array("error" => "Acceso no autorizado");
    echo json_encode($response);
}
?>
