<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class ControlDeSesion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()) {
            $fecha_cierre = Auth::user()->fecha_cierre;

            if (Auth::user()->usuarios_plan_id >= 1 && now() > $fecha_cierre) {
                if (!$request->session()->get('plan_id_para_pagar')) {
                    $plan_id = Auth::user()->usuarios_plan_id;
                    $request->session()->put('plan_id_para_pagar', $plan_id);
                    return redirect()->route('pagar-plan')->with('status.message', 'Tu plana a expirado, Debes abonar para seguir disfrutando de nuestros beneficios')
                        ->with('status.type', 'danger');
                } else {
                    return redirect()->route('pagar-plan');
                }
            };
        }
        return $next($request);
    }
}
