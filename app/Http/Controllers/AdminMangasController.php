<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Genero;
use App\Models\Usuario;
use App\Models\UsuariosPagos;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class AdminMangasController extends Controller
{
    public function index()
    {
        $mangas = Manga::with(['generos'])->get();
        return view('admin.mangas.index', [
            'mangas' => $mangas
        ]);
    }
    public function ver(int $id)
    {
        $manga = Manga::findOrFail($id);
        return view('verDetalle', [
            'manga' => $manga,
        ]);
    }
    public function formNuevo()
    {
        return view('admin.mangas.formNuevo', [
            'generos' => Genero::orderBy('nombre')->get(),
            'categorias' => Categorias::orderBy('categoria')->get(),
        ]);
    }

    public function grabarNuevo(Request $request)
    {
        $request->validate(Manga::VALIDACION, Manga::MENSAJES);
        $data = $request->except(['_token']);
        
        if ($request->hasFile('portada')) {

            $portada = $request->file('portada');
            $portadaName = date('YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $portada->extension();
            $portada->move(public_path('img'), $portadaName);
            $data['portada'] = $portadaName;

        }
        
        $manga = Manga::create($data);
        $manga->generos()->attach($data['generos'] ?? []);
        return redirect()->route('admin.mangas.lista')->with('status.message', 'El Manga <b>' . $manga->titulo . '</b> fue creado con exito.')
            ->with('status.type', 'success');
    }

    public function eliminarForm(int $id)
    {
        $manga = Manga::findOrFail($id);
        return view('admin.mangas.eliminar', [
            'manga' => $manga
        ]);
    }

    public function eliminarManga(int $id)
    {

        $manga = Manga::findOrFail($id);
        $manga->generos()->detach();
        $manga->comentarios()->delete();
        $manga->delete();
        $oldPortada = $manga->portada;
        if ($oldPortada != null && file_exists(public_path('img' . $oldPortada))) {
            unlink(public_path('img/' . $oldPortada));
        }
        return redirect()->route('admin.mangas.lista')->with('status.message', 'El Manga <b>' . $manga->titulo . '</b> fue eliminado con exito.')
            ->with('status.type', 'success');
    }

    public function editarForm(int $id)
    {
        $manga = Manga::findOrFail($id);
        return view('admin.mangas.editar', [
            'manga' => $manga,
            'generos' => Genero::orderBy('nombre')->get(),
            'categorias' => Categorias::orderBy('categoria')->get(),
        ]);
    }

    public function editarManga(Request $request, int $id,)
    {
        $request->validate(Manga::VALIDACION, Manga::MENSAJES);
        $manga = Manga::find($id);
        $data = $request->except(['_token']);
        $oldPortada = $manga->portada;
        
        if ($request->hasFile('portada')) {
            $portada = $request->file('portada');
            $portadaName = date('YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $portada->extension();
            $portada->move(public_path('img'), $portadaName);
            $data['portada'] = $portadaName;
            $oldPortada = $manga->portada;
        } else {
            $oldPortada == null;
        }
        $manga->update($data);
        $manga->generos()->sync($data['generos'] ?? []);
        if ($oldPortada != null && file_exists(public_path('img' . $oldPortada))) {
            unlink(public_path('img/' . $oldPortada));
        }
        return redirect()->route('admin.mangas.lista')->with('status.message', 'El Manga <b>' . $manga->titulo . '</b> fue editado con exito.')
            ->with('status.type', 'success');
    }

    public function guardar(Request $request)
    {
        $validatedData = $request->validate(Comentario::VALIDACION, Comentario::MENSAJES);
        $usuarioId = Auth::user()->id;

        DB::table('comentarios')->insert([
            'manga_id' => $validatedData['manga_id'],
            'comentario' => $validatedData['comentario'],
            'usuario_id' => $usuarioId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back();
    }


    public function usuarioLista(Request $request)
    {
        $buscar = $request->input('search');
        $orden = $request->input('o', 'created_at');
        $direccion = $request->input('d','asc');
        $usuarios = Usuario::
        select('usuarios.*', 'usuarios_plans.imagen as imgPlan',)
        ->leftJoin('usuarios_plans', 'usuarios.usuarios_plan_id', '=', 'usuarios_plans.id')
        ->orderBy($orden,$direccion)
        ->where('usuarios.nombre_usuario', 'LIKE', '%' . $buscar . '%')
        ->get();
        return view('admin.mangas.usuarios', [
            'usuarios' => $usuarios,
            'orden' => $orden,
            'direccion' => $direccion,
        ]);
    }

    public function verUsuario(int $id)
    {

        $usuario = Usuario::findOrFail($id);
        return view('admin.mangas.verUsuario', [
            'usuario' => $usuario,

        ]);
    }

    public function pagosLista(Request $request){
        $buscar = $request->input('search');
        $orden = $request->input('o','created_at');
        $direccion = $request->input('d','asc');
        $pagosSuscripciones = UsuariosPagos::select('usuarios_pagos.monto', 'usuarios.nombre_usuario','usuarios.imagen','usuarios.id as usuarioId', 'usuarios_plans.nombre as plan', 'usuarios_pagos.created_at', 'usuarios_pagos.id')
            ->join('usuarios', 'usuarios_pagos.usuario_id', '=', 'usuarios.id')
            ->join('usuarios_plans', 'usuarios_pagos.plan_id', '=', 'usuarios_plans.id')
            ->where('usuarios.nombre_usuario','LIKE', '%' . $buscar . '%')
            ->orderBy($orden, $direccion)
            ->get();
        return view('admin.mangas.pagos', [
            'pagos' => $pagosSuscripciones,
            'orden' => $orden,
            'direccion' => $direccion,

        ]);

    }


    public function dashboard()
    {
        $usuarios = Usuario::latest()->take(5)->get();
        $ultimasSuscripciones = DB::table('usuarios_pagos')->select('usuarios_pagos.monto', 'usuarios.nombre_usuario', 'usuarios_plans.nombre as plan', 'usuarios_pagos.created_at')
            ->join('usuarios', 'usuarios_pagos.usuario_id', '=', 'usuarios.id')
            ->join('usuarios_plans', 'usuarios_pagos.plan_id', '=', 'usuarios_plans.id')
            ->orderBy('usuarios_pagos.created_at')
            ->latest()->take(7)->get();
        $ingresosTotales = DB::table('usuarios_pagos')->sum('monto');

        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;

        $ingresosEsteMes =
            DB::table('usuarios_pagos')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)->sum('monto');

        $usuariosTotales = DB::table('usuarios')->count();

        $planesAdquiridos = DB::table('usuarios')->whereNotNull('usuarios_plan_id')->count();

        return view('admin.mangas.dashboard', [
            'ingresosEsteMes' => $ingresosEsteMes,
            'ingresosTotales' => $ingresosTotales,
            'planesAdquiridos' => $planesAdquiridos,
            'usuariosTotales' => $usuariosTotales,
            'usuarios' => $usuarios,
            'ultimasSuscripciones' => $ultimasSuscripciones,
        ]);
    }

    public function banear($id)
    {
        $usuario = Usuario::find($id);

        if ($usuario && $usuario->usuarios_rol_id != 1) {
            $usuario->ban = !$usuario->ban;
            $usuario->save();
            $mensaje = ($usuario->ban) ? 'baneado' : 'desbaneado';
            return redirect()->route('admin.mangas.usuarios')->with('status.message', 'El usuario <b>' . $usuario->nombre_usuario . '</b> a sido ' . $mensaje . ' con exito')->with('status.type', 'success');
        } else {
            return redirect()->route('admin.mangas.usuarios')->with('status.message', 'Por algun motivo el usuario no a sido baneado')->with('status.type', 'danger');
        }
    }
}
