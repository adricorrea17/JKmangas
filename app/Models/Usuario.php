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
    protected $fillable = ['nombre_usuario', 'password', 'email', 'usuarios_rol_id', 'imagen'];
    protected $hidden = ['password', 'remember_token'];


    public const VALIDACION = [
        'nombre_usuario' => 'required',
        'password' => 'required',
    ];
    public const MENSAJES = [
        'nombre_usuario.required' => 'Tiene que poner su nombre para ingresar',
        'password.required' => 'Tiene que poner su contraseña para ingresar',
    ];

    public const VALIDAR = [
        'nombre_usuario' => 'required|unique:usuarios',
        'password' => 'required|min:5',
        'email' => 'required|unique:usuarios',
    ];
    public const MENSAJE = [
        'nombre_usuario.required' => 'El Campo de nombre de usuario esta vacio',
        'nombre_usuario.unique' => 'El nombre de usuario ya existe',
        'password.required' => 'El Campo de password esta vacio',
        'password.min' => 'La contraseña debe tener al menos 5 caracteres',
        'email.required' => 'El Campo de email esta vacio',
        'email.unique' => 'El correo electrónico ya está registrado',
    ];

    public function rol()
    {
        return $this->hasOne(UsuariosRol::class, 'id', 'usuarios_rol_id');
    }

    public function UsuariosPlans()
    {
        return $this->hasOne(UsuariosPlans::class, 'id', 'usuarios_plan_id');
    }
    
};
