<?php
// repositories/BaseRepository.php

require_once __DIR__ . '/../config/db.php';

class BaseRepository {
    protected $pdo;

    public function __construct() {
        $config = require __DIR__ . '/../config/db.php';
        $dsn = sprintf('%s:host=%s;dbname=%s;charset=%s',
            $config['driver'],
            $config['host'],
            $config['database'],
            $config['charset']
        );
        $this->pdo = new PDO($dsn, $config['username'], $config['password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->pdo;
    }
}
