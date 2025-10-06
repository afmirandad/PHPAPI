<?php
// controllers/UserController.php

require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../services/JwtService.php';

class UserController {
    protected $userService;
    protected $jwtService;

    public function __construct() {
        $this->userService = new UserService();
        $this->jwtService = new JwtService();
    }

    public function index() {
        $users = $this->userService->getAllUsers();
        header('Content-Type: application/json');
        echo json_encode($users);
    }

    public function show($documento) {
        $user = $this->userService->getUserByDocumento($documento);
        header('Content-Type: application/json');
        echo json_encode($user);
    }

    public function store($data) {
        $user = $this->userService->createUser(
            $data['documento'],
            $data['nombres'],
            $data['apellidos'],
            $data['telefono'],
            $data['fecha_nacimiento'],
            $data['correo'],
            $data['contrasena']
        );
        header('Content-Type: application/json');
        echo json_encode($user);
    }

    public function update($documento, $data) {
        $user = $this->userService->updateUser(
            $documento,
            $data['nombres'],
            $data['apellidos'],
            $data['telefono'],
            $data['fecha_nacimiento'],
            $data['correo'],
            $data['contrasena']
        );
        header('Content-Type: application/json');
        echo json_encode($user);
    }

    public function destroy($documento) {
        $result = $this->userService->deleteUser($documento);
        header('Content-Type: application/json');
        echo json_encode(['deleted' => $result]);
    }

    public function login($correo, $contrasena) {
        $user = User::where('correo', $correo)->where('contrasena', $contrasena)->first();
        if ($user) {
            $token = $this->jwtService->generateToken([
                'documento' => $user->documento,
                'correo' => $user->correo
            ]);
            header('Content-Type: application/json');
            echo json_encode(['token' => $token]);
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'Credenciales inválidas']);
        }
    }
}
