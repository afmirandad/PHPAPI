<?php
// repositories/UserRepository.php

require_once __DIR__ . '/../config/eloquent.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends BaseRepository {
    public function create($data) {
        return User::create($data);
    }

    public function findByDocumento($documento) {
        return User::find($documento);
    }

        public function update($documento, $data) {
            $user = User::find($documento);
            if ($user) {
                $user->update($data);
                return $user;
            }
            return null;
        }

        public function delete($documento) {
            $user = User::find($documento);
            if ($user) {
                return $user->delete();
            }
            return false;
        }

        public function findAll() {
            return User::all();
        }
}
