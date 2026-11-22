<?php

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/models/UserDAO.php';

try {
    $userDao = new UserDAO();

    if (isset($_GET['id']) && $_GET['id'] !== '') {
        $id = $_GET['id'];
        $user = $userDao->getById($id);

        if ($user !== null) {
            $response = [
                'success' => true,
                'message' => 'Usuario obtenido correctamente',
                'data' => $user->toArray(),
            ];
        } else {
            $response = [
                'success' => false,
                'message' => "Usuario con id $id no encontrado",
                'data' => null,
            ];
        }
    } else {
        $users = $userDao->getAll();
        $data = [];

        foreach ($users as $user) {
            $data[] = $user->toArray();
        }

        $response = [
            'success' => true,
            'message' => 'Usuarios obtenidos correctamente',
            'data' => $data,
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