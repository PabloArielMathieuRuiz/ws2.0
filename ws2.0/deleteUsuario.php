<?php

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/models/UserDAO.php';

try {
    // Comprobamos que nos hayan pasado el parámetro "id" por GET
    if (!isset($_GET['id']) || $_GET['id'] === '') {
        $response = [
            'success' => false,
            'message' => 'No se ha proporcionado un id válido',
            'data' => null,
        ];
    } else {
        $id = $_GET['id'];
        $userDao = new UserDAO();

        // Intentamos eliminar el usuario; si existía, nos devuelve sus datos
        $deletedUser = $userDao->delete($id);

        if ($deletedUser !== null) {
            $response = [
                'success' => true,
                'message' => 'Usuario eliminado correctamente',
                'data' => $deletedUser->toArray(),
            ];
        } else {
            $response = [
                'success' => false,
                'message' => "Usuario con id $id no encontrado",
                'data' => null,
            ];
        }
    }
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Error: ' . $e->getMessage(),
        'data' => null,
    ];
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);