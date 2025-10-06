<?php
// models/User.php

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'users';
    protected $primaryKey = 'documento';
    public $timestamps = false;

    protected $fillable = [
        'documento',
        'nombres',
        'apellidos',
        'telefono',
        'fecha_nacimiento',
        'correo',
        'contrasena'
    ];
}
