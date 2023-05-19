<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends User
{
    use HasApiTokens, Notifiable;
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre_usuario', 'password', 'email', 'usuario_rol_id', 'imagen'];
    protected $hidden = ['password', 'remember_token'];
    public const VALIDACION = [
        'nombre_usuario' => 'required',
        'password' => 'required',
    ];
    public const MENSAJES = [
        'nombre_usuario.required' => 'El Campo de nombre de usuario esta vacio',
        'password.required' => 'El Campo de password esta vacio',
    ];

    public function UsuariosPlans()
    {
        return $this->belongsToMany(UsuariosPlans::class, 'usuarios_tienen_UsuariosPlans', 'usuario_id', 'usuarios_plan_id', 'usuario_id', 'usuarios_plan_id');
    }
};
