<?php
error_reporting(0);

if (isset($_POST['titulo']) && isset($_POST['link']) && isset($_POST['desc']) && isset($_POST['claves'])) {
    $json_data = json_decode(file_get_contents('../js/database.js'), true);

    // Generar id automático
    $id = count($json_data) + 1;

    // Obtener fecha de inicio del sistema
    $fechaInicio = date('d/m/Y H:i:s e');

    $obj = array(
        "id" => strval($id),
        "title" => $_POST['titulo'],
        "link" => $_POST['link'],
        "description" => $_POST['desc'],
        "claves" => $_POST['claves'],
        "fechaInicio" => $fechaInicio
    );

    array_push($json_data, $obj);

    $validate = file_put_contents('../js/database.js', json_encode($json_data));

    if ($validate) {
        $obj = array(
            "success" => "Guardado correctamente"
        );
        print json_encode($obj);
    } else {
        $obj = array(
            "error" => "Error al guardar, por favor cambie la configuración"
        );
        print json_encode($obj);
    }
    die;
} else {
    $obj = array(
        "error" => "Por favor, envíe los atributos mediante el método POST"
    );
    print json_encode($obj);
}
?>
