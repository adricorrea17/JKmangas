<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosPagos extends Model
{
    protected $table = 'usuarios_pagos';
    public $timestamps = true;

    public function plan()
    {
        return $this->hasOne('UsuariosPlanes', 'plan_id');
    }
}
