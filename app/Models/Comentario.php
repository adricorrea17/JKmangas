<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios'; 
    protected $primaryKey = "id";
    protected $fillable = [
        'manga_id',
        'usuario_id',
        'comentario',
    ];
    public const VALIDACION = [
        'manga_id' => 'required|integer',
        'comentario' => 'required|string',
    ];
    public const MENSAJES = [
        'manga_id.required' => 'El Campo de titulo esta vacio',
        'comentario.required' => 'El titulo no puedes ser menor a dos caracteres',
        
    ];

    // Relación con el modelo Manga
    public function manga()
    {
        return $this->belongsTo(Manga::class, 'manga_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
