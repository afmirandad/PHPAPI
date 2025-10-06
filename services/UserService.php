<?php
// services/UserService.php

require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../models/User.php';

class UserService {
    protected $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function createUser($documento, $nombres, $apellidos, $telefono, $fechaNacimiento, $correo, $contrasena) {
        $data = [
            'documento' => $documento,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'telefono' => $telefono,
            'fecha_nacimiento' => $fechaNacimiento,
            'correo' => $correo,
            'contrasena' => $contrasena
        ];
        return $this->userRepository->create($data);
    }

    public function getUserByDocumento($documento) {
        return $this->userRepository->findByDocumento($documento);
    }

    // Puedes agregar más métodos para update, delete, etc.
        public function updateUser($documento, $nombres, $apellidos, $telefono, $fechaNacimiento, $correo, $contrasena) {
            $data = [
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'telefono' => $telefono,
                'fecha_nacimiento' => $fechaNacimiento,
                'correo' => $correo,
                'contrasena' => $contrasena
            ];
            return $this->userRepository->update($documento, $data);
        }

        public function deleteUser($documento) {
            return $this->userRepository->delete($documento);
        }

        public function getAllUsers() {
            return $this->userRepository->findAll();
        }
}
