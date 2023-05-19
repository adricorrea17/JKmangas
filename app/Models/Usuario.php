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
    protected $primaryKey = 'usuario_id';
    protected $fillable = ['nombre_usuario', 'password', 'email', 'rol', 'perfil'];
    protected $hidden = ['password', 'remember_token'];
    public const VALIDACION = [
        'nombre_usuario' => 'required',
        'password' => 'required',
    ];
    public const MENSAJES = [
        'nombre_usuario.required' => 'El Campo de nombre de usuario esta vacio',
        'password.required' => 'El Campo de password esta vacio',
    ];

    public function paquetes()
    {
        return $this->belongsToMany(Paquetes::class, 'usuarios_tienen_paquetes', 'usuario_id', 'paquete_id', 'usuario_id', 'paquete_id');
    }
};
