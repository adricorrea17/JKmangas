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
