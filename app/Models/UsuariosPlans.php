<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UsuariosPlans
 *
 * @property int $usuarios_plan_id
 * @property string $nombre
 * @property int $duracion
 * @property string $portada
 * @property int $precio
 * @property string $descripcion_paquete
 * @property int $usuario_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read UsuariosPlans $usuarios
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans whereDescripcionPaquete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans whereDuracion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans wherePaqueteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans wherePortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsuariosPlans whereUsuarioId($value)
 * @mixin \Eloquent
 */
class UsuariosPlans extends Model
{
    protected $table = "usuarios_plans";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'imagen', 'precio', 'descripcion', 'id'];

    public function usuarios()
    {
        return $this->belongsTo(
            Usuario::class,
            'id',
            'id',
        );
    }
}
