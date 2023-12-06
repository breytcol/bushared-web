<?php
session_start();

$data = json_decode(file_get_contents('data.js'), true);

$username = $_POST['username'];
$password = $_POST['password'];

$userInfo = array();

foreach ($data as $user) {
    if ($user['username'] === $username && $user['password'] === $password) {
        // Usuario encontrado, establecer la información en la sesión
        $_SESSION['userId'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        $userInfo = array(
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role']
        );

        break;
    }
}

if (empty($userInfo)) {
    echo json_encode(array('success' => false));
} else {
    echo json_encode(array('success' => true, 'userInfo' => $userInfo));
}
?>
