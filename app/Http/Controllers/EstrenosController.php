<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;

class EstrenosController extends AdminMangasController
{
    public function index()
    {
        $mangas = Manga::all();
        return view('estrenos', [
            'mangas' => $mangas
        ]);
    }
}
