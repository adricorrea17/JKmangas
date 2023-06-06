<?php

namespace App\Http\Controllers;

use App\Models\UsuariosPlans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function home()
    {
        $UsuariosPlans = UsuariosPlans::all();
        $usuario = Auth::user();
        return view('welcome', [
            'UsuariosPlans' => $UsuariosPlans,
            'usuario' => $usuario
        ]);
    }
}
