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
            if ($usuario->usuarios_plan_id == $nuevo_plan_id) {
                return redirect()->back()->with('status.message', 'Por algun motivo no se pudo cambiar el plan')->with('status.type', 'danger');
            } elseif ($nuevo_plan_id <= '0') {
                $nuevo_plan_id = null;
                $mensaje = 'El plan a sido cancelado correctamente';
            } elseif ($usuario->usuarios_plan_id < $nuevo_plan_id) {
                $request->session()->put('plan_id_para_pagar', $nuevo_plan_id);
                return redirect()->route('pagar-plan');
            } elseif ($usuario->usuarios_plan_id > $nuevo_plan_id) {
                $mensaje = 'El plan a sido reducido correctamente';
            }
            Usuario::where('id', $usuario->id)->update(['usuarios_plan_id' => $nuevo_plan_id]);
            return redirect()->back()->with('status.message', $mensaje)->with('status.type', 'success');
        } else {
            return redirect()->back()->with('status.message', 'No pudiste cambiar el plan porque el usuario se encuentra baneado')->with('status.type', 'danger');
        }
    }

    public function CrearBotonPago(Request $request)
    {
        $planId = $request->session()->get('plan_id_para_pagar');
        $planUsuario = UsuariosPlans::findOrFail($planId);
        $mp_public = env('APP_MP_PUBLIC');
        MercadoPago\SDK::setAccessToken(env('APP_MPKEY'));
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
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

        if (request()->get('status') == 'approved') {
            $planId = $request->session()->get('plan_id_para_pagar');
            $plan = UsuariosPlans::findOrFail($planId);

            UsuariosPagos::create([
                'plan_id' => $plan->id,
                'usuario_id' => Auth::user()->id,
                'mp_validacion' => json_encode($respuesta),
                'monto' => $plan->precio
            ]);
            Usuario::where('id', Auth::user()->id)->update(['usuarios_plan_id' => $plan->id, 'fecha_cierre' => now()->addMonths(1)]);
            return redirect()->route('inicio')->with('status.message', 'Felicidades el pago se a completado con exito')->with('status.type', 'success');
        } else {
            abort(404);
        }
    }
}