<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\UsuariosPlans;
use App\Models\UsuariosPagos;
use MercadoPago;


class UsuariosPagosController extends Controller
{
    public function cambiarPlan(Request $request)
    {
        if (Auth::user()->ban != 1) {
            $usuario = Auth::user();
            $nuevo_plan_id = $request->input('plan');
            if ($usuario->usuarios_plan_id == $nuevo_plan_id || $usuario->usuarios_plan_id > $nuevo_plan_id) {
                $planUsuario = UsuariosPlans::findOrFail($nuevo_plan_id);
                $usuarioId = Usuario::findOrFail($usuario->id);
                return view('auth.verificacionPlan', [
                    'plan' => $planUsuario,
                    'usuario' => $usuarioId,
                ]);
            } elseif ($usuario->usuarios_plan_id < $nuevo_plan_id) {
                $request->session()->put('plan_id_para_pagar', $nuevo_plan_id);
                return redirect()->route('pagar-plan');
            }
        } else {
            return redirect()->back()->with('status.message', 'No pudiste cambiar el plan porque el usuario se encuentra baneado')->with('status.type', 'danger');
        }
    }



    public function VerificacionPlan(Request $request)
    {
        $usuario = Auth::user();
        $plan_id = $request->input('plan');

        if (now() < $usuario->fecha_cierre) {
            if ($usuario->usuarios_plan_id == $plan_id) {
                $plan_id = null;
                $mensaje = 'El Plan a sido cancelado con exito';
            } elseif ($usuario->usuarios_plan_id > $plan_id) {
                $mensaje = 'El Plan a sido reducido con exito';
            }
            Usuario::where('id', $usuario->id)->update(['usuarios_plan_id' => $plan_id]);

            return redirect()->route('inicio')->with('status.message', $mensaje)->with('status.type', 'success');
        } else {
            $request->session()->put('plan_id_para_pagar', $plan_id);
            return redirect()->route('pagar-plan');
        }
    }


    public function CrearBotonPago(Request $request)
    {

        $planId = $request->session()->get('plan_id_para_pagar');
        $request->session()->put('plan_id_para_pagar', false);

        $planUsuario = UsuariosPlans::findOrFail($planId);
        $mp_public = env('APP_MP_PUBLIC');
        MercadoPago\SDK::setAccessToken(env('APP_MPKEY'));
        $preference = new MercadoPago\Preference();

        $item = new MercadoPago\Item();
        $item->title = $planUsuario->nombre;
        $item->quantity = 1;
        $item->description = $planUsuario->descripcion;
        $item->unit_price = $planUsuario->precio;

        $preference->items = array($item);

        $preference->back_urls = array(
            "success" => url("pago/feedback"),
            "failure" => url("pago/feedback"),
            "pending" => url("pago/feedback")
        );

        $preference->auto_return = "approved";

        $preference->save();
        $request->session()->put('plan_id_respuesta', $planId);
        return view('pagarPlan', [
            'preference' => $preference,
            'plan' => $planUsuario,
            'mp_public' => $mp_public,
        ]);
    }

    public function respuestaPagoMP(Request $request)
    {

        $respuesta = array(
            'Payment' => request()->get('payment_id'),
            'Status' => request()->get('status'),
            'MerchantOrder' => request()->get('merchant_order_id')
        );

        if (request()->get('status') === 'approved') {
            $planId = $request->session()->get('plan_id_respuesta');
            $plan = UsuariosPlans::findOrFail($planId);
            UsuariosPagos::create([
                'plan_id' => $plan->id,
                'usuario_id' => Auth::user()->id,
                'mp_validacion' => json_encode($respuesta),
                'monto' => $plan->precio
            ]);
            Usuario::where('id', Auth::user()->id)->update(['usuarios_plan_id' => $planId, 'fecha_cierre' => now()->addMonths(1)]);
            return redirect()->route('inicio')->with('status.message', 'Felicidades tu pago se completo con exito!!!')->with('status.type', 'success');
        } else {
            
            return redirect()->route('inicio');
        }
    
    }
}
