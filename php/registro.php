<?php
$data = json_decode(file_get_contents('data.js'), true);

$newUser = array(
    'id' => uniqid(),
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'role' => 'cliente' // Asignar automáticamente el rol 'cliente'
);

$data[] = $newUser;

file_put_contents('data.js', json_encode($data));

echo json_encode(array('success' => true));
?>


