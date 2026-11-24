<?php

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/models/UserDAO.php';

try {
    if (!isset($_GET['id']) || $_GET['id'] === '') {
        $response = [
            'success' => false,
            'message' => 'No se ha proporcionado un id válido',
            'data' => null,
        ];
    } else {
        $id = $_GET['id'];
        $userDao = new UserDAO();
        $user = $userDao->getById($id);

        if ($user === null) {
            $response = [
                'success' => false,
                'message' => "Usuario con id $id no encontrado",
                'data' => null,
            ];
        } else {
            if (isset($_POST['name']) && trim($_POST['name']) !== '') {
                $user->setName($_POST['name']);
            }
            if (isset($_POST['surname']) && trim($_POST['surname']) !== '') {
                $user->setSurname($_POST['surname']);
            }
            if (isset($_POST['password']) && trim($_POST['password']) !== '') {
                $user->setPassword($_POST['password']);
            }
            if (isset($_POST['telefono']) && trim($_POST['telefono']) !== '') {
                $user->setTelefono($_POST['telefono']);
            }
            if (isset($_POST['email']) && trim($_POST['email']) !== '') {
                $user->setEmail($_POST['email']);
            }
            if (isset($_POST['sex']) && trim($_POST['sex']) !== '') {
                $user->setSex($_POST['sex']);
            }
            if (isset($_POST['fecha_nacimiento']) && trim($_POST['fecha_nacimiento']) !== '') {
                $user->setFechaNacimiento($_POST['fecha_nacimiento']);
            }

            $updatedUser = $userDao->update($user);

            $response = [
                'success' => true,
                'message' => 'Usuario modificado correctamente',
                'data' => $updatedUser->toArray(),
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