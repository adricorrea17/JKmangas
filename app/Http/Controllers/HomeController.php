<?php

namespace App\Http\Controllers;

use App\Models\UsuariosPlans;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $UsuariosPlans = UsuariosPlans::all();
        return view('welcome', [
            'UsuariosPlans' => $UsuariosPlans
        ]);
    }
}
