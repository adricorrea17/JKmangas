<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model 
{

    protected $table = 'usuarios';
    public $timestamps = true;

    public function rol()
    {
        return $this->hasOne('UsuariosRol', 'usuarios_rol_id');
    }

    public function plan()
    {
        return $this->hasOne('UsuariosPlanes', 'usuarios_plan_id');
    }

    public function pagos()
    {
        return $this->hasMany('UsuariosPago', 'usuario_id');
    }

}