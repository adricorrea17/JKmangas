<?php

namespace App\Http\Controllers;

use App\Models\UsuariosPlans;
use App\Models\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercadoPago;


class HomeController extends Controller
{
    public function home()
    {
        $UsuariosPlans = UsuariosPlans::all();
        $usuario = Auth::user();
        $mangas = Manga::all();

        return view('welcome', [
            'mangas' => $mangas,
            'UsuariosPlans' => $UsuariosPlans,
            'usuario' => $usuario
        ]);
    }
}
