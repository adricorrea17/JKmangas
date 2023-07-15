<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Manga
 *
 * @property int $manga_id
 * @property string $titulo
 * @property string $precio
 * @property string $descripcion
 * @property string|null $portada
 * @property string $mangaka
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|manga newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|manga newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|manga query()
 * @method static \Illuminate\Database\Eloquent\Builder|manga whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|manga whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|manga whereMangaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|manga whereMangaka($value)
 * @method static \Illuminate\Database\Eloquent\Builder|manga wherePortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|manga wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|manga whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|manga whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $tomos
 * @property string $proximo_tomo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Genero[] $generos
 * @property-read int|null $generos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Manga whereProximoTomo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Manga whereTomos($value)
 */
class Manga extends Model
{

    /**
     * $rules = [
     *     'archivo' => 'required|mimes:jpeg,png,pdf|max:2048',
     * ];
     *$messages = [
     *    'archivo.required' => 'Debe seleccionar un archivo para cargar.',
     *    'archivo.mimes' => 'El archivo debe ser de tipo JPEG, PNG o PDF.',
     *   'archivo.max' => 'El tamaño máximo del archivo es de 2 MB.',
     *];
     *$validator = Validator::make($request->all(), $rules, $messages);
     *
     * if ($validator->fails()) {
     *     return redirect()->back()->withErrors($validator)->withInput();*
     */

    protected $table = "mangas";
    protected $primaryKey = "manga_id";
    protected $fillable = ['titulo', 'precio', 'descripcion', 'portada', 'mangaka', 'tomos', 'proximo_tomo', 'genero_id'];
    public const VALIDACION = [
        'titulo' => 'required', 'min:2',
        'descripcion' => 'required',
        'precio' => 'required', 'numeric', 'min:0',
        'mangaka' => 'required',
        'tomos' => 'required', 'numeric', 'min:0',
        'proximo_tomo' => 'required'
    ];
    public const MENSAJES = [
        'titulo.required' => 'El Campo de titulo esta vacio',
        'titulo.min' => 'El titulo no puedes ser menor a dos caracteres',
        'descripcion.required' => 'El Campo de descripcion esta vacio',
        'precio.required' => 'El Campo de precio esta vacio',
        'precio.min' => 'El precio no puede no tener ningun caracter',
        'precio.numeric' => 'El precio tiene que ser numerico',
        'mangaka.required' => 'El Campo del mangaka esta vacio',
        'tomos.required' => 'El Campo de tomos esta vacio',
        'tomos.min' => 'los tomos no puede no tener ningun caracter',
        'tomos.numeric' => 'los tomo tiene que ser numerico',
        'proximo_tomo.required' => 'El Campo de titulo esta vacio',
    ];
    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'generos_mangas', 'manga_id', 'genero_id', 'manga_id', 'genero_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'manga_id', 'manga_id');
    }

    public function human_proximo_tomo()
    {
        return Carbon::parse($this->proximo_tomo)->locale('es')->diffForHumans();
    }
}
