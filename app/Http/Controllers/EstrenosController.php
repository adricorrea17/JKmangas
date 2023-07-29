<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use Auth;

class EstrenosController extends AdminMangasController
{
    public function index()
    {
        $mangas = Manga::where('categoria_id', 1)->get();
        $usuario = Auth::user();

        if(Auth::user()){
        if ($usuario->usuarios_plan_id == 1) {
            $mangas = Manga::whereIn('categoria_id', [1,  2])->get();
        }elseif($usuario->usuarios_plan_id >= 2){
            $mangas = Manga::all();
        }
    
    }
    
    
        return view('estrenos', [
            'mangas' => $mangas
        ]);
    }

}
