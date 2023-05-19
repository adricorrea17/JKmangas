<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Paquetes
 *
 * @property int $paquete_id
 * @property string $nombre
 * @property int $duracion
 * @property string $portada
 * @property int $precio
 * @property string $descripcion_paquete
 * @property int $usuario_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Paquetes $usuarios
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes query()
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes whereDescripcionPaquete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes whereDuracion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes wherePaqueteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes wherePortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paquetes whereUsuarioId($value)
 * @mixin \Eloquent
 */
class Paquetes extends Model
{
    protected $table = "paquetes";
    protected $primaryKey = "paquete_id";
    protected $fillable = ['nombre', 'duracion', 'portada', 'precio', 'descripcion_paquete', 'usuario_id'];

    public function usuarios()
    {
        return $this->belongsTo(
            Paquetes::class,
            'usuario_id',
            'usuario_id'
        );
    }
}
