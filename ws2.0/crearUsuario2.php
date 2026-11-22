<?php

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/models/UserDAO.php';

try {
    // Lista de campos obligatorios que deben llegar desde el formulario por POST
    $requiredFields = ['name', 'surname', 'password', 'telefono', 'email', 'sex', 'fecha_nacimiento'];
    $missing = [];

    // Comprobamos si falta algún campo o si viene solo con espacios en blanco
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
            $missing[] = $field;
        }
    }

    if (!empty($missing)) {
        $response = [
            'success' => false,
            'message' => 'Faltan campos obligatorios: ' . implode(', ', $missing),
            'data' => null,
        ];
    } else {
        // Creamos una instancia de User con los datos recibidos por POST
        $user = new User(
            $_POST['name'],
            $_POST['surname'],
            $_POST['password'],
            $_POST['telefono'],
            $_POST['email'],
            $_POST['sex'],
            $_POST['fecha_nacimiento']
        );

        // Guardamos el usuario en la base de datos mediante UserDAO
        $userDao = new UserDAO();
        $createdUser = $userDao->create($user);

        $response = [
            'success' => true,
            'message' => 'Usuario creado con éxito',
            'data' => $createdUser->toArray(),
        ];
    }
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Error: ' . $e->getMessage(),
        'data' => null,
    ];
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);