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

        
        MercadoPago\SDK::setAccessToken(env('APP_MPKEY'));
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Mi producto';
        $item->quantity = 1;
        $item->unit_price = 75.56;
        
        $preference->items = array($item);
    
        $preference->back_urls = array(
            "success" => url("pago/feedback"),
            "failure" => url("pago/feedback"), 
            "pending" => url("pago/feedback")
        );

        $preference->auto_return = "approved"; 

        $preference->save();

        echo '
        <div id="wallet_container"></div>

        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
            const mp = new MercadoPago("TEST-b482a0e5-eb54-41b7-a6b3-40c36ed246b6");
            const bricksBuilder = mp.bricks();

            mp.bricks().create("wallet", "wallet_container", {
                initialization: {
                    preferenceId: "'.$preference->id.'",
                },
             });             
        </script>
        ';

        dd();

        return view('welcome', [
            'mangas' => $mangas,
            'UsuariosPlans' => $UsuariosPlans,
            'usuario' => $usuario
        ]);
    }
}
