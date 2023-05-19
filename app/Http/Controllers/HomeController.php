<?php

namespace App\Http\Controllers;

use App\Models\Paquetes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $paquetes = Paquetes::all();
        return view('welcome', [
            'paquetes' => $paquetes
        ]);
    }
}
