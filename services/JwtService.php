<?php
// services/JwtService.php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtService {
    private $secret;
    private $algo;

    public function __construct() {
        $this->secret = $_ENV['JWT_SECRET'] ?? 'supersecretkey';
        $this->algo = $_ENV['JWT_ALGO'] ?? 'HS256';
    }

    public function generateToken($payload, $exp = 3600) {
        $payload['exp'] = time() + $exp;
        return JWT::encode($payload, $this->secret, $this->algo);
    }

    public function validateToken($token) {
        try {
            $decoded = JWT::decode($token, new Key($this->secret, $this->algo));
            return (array) $decoded;
        } catch (Exception $e) {
            return false;
        }
    }
}
