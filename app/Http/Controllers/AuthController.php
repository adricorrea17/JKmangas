<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\UsuariosPlans;
use App\Models\UsuariosRol;
use DB;
use Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function loginAccion(Request $request,)
    {

        $request->validate(Usuario::VALIDACION, Usuario::MENSAJES);
        $request->validate([
            'nombre_usuario' => 'required',
            'password' => 'required',
        ]);
        $credenciales = [
            'nombre_usuario' => $request->input('nombre_usuario'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect()->route('auth.perfil')->with('status.message', 'Bienvenido a JKmangas')->with('status.type', 'success');
        }
        return redirect()
            ->route('auth.login.form')->withInput()->with('status.message', 'Lo sentimos pero las credenciales son distintas')->with('status.type', 'danger');
    }
    public function logOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('inicio')->with('status.message', 'La sesion se a cerrado con exito')->with('status.type', 'success');
    }
    public function registroForm(Request $request)
    {
        return view('auth.register');
    }
    public function registroAccion(Request $request)
    {
        $request->validate(Usuario::VALIDAR, Usuario::MENSAJE);


        Usuario::create([
            'nombre_usuario' => $request->input('nombre_usuario'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'usuarios_rol_id' => 2,
        ]);
        return redirect()->route('inicio')->with('status.message', 'La cuenta se a creado con exito')->with('status.type', 'success');
    }
    public function usuario()
    {
        $usuarios = DB::table('usuarios')
        ->select('usuarios.*', 'usuarios_plans.imagen as imgPlan')
        ->join('usuarios_plans', 'usuarios.usuarios_plan_id', '=', 'usuarios_plans.id')
        ->orderBy('id')
        ->get();

        return view('admin.mangas.usuarios', [
            'usuarios' => $usuarios
        ]);
    }

    public function ver(int $id)
    {

        $usuario = Usuario::findOrFail($id);
        return view('admin.mangas.verUsuario', [
            'usuario' => $usuario,

        ]);
    }

    public function perfil()
    {

        $usuario = Auth::user();
        $UsuariosPlans = UsuariosPlans::all();

        return view('auth.perfil', [
            'UsuariosPlans' => $UsuariosPlans,
            'usuario' => $usuario
        ]);
    }

    public function perfil_form()
    {
        $usuario = Auth::user();
        $UsuariosPlans = UsuariosPlans::all();

        return view('auth.perfilForm', [
            'UsuariosPlans' => $UsuariosPlans,
            'usuario' => $usuario
        ]);
    }

    public function perfil_edit(Request $request)
{
    $usuario = Usuario::find(Auth::user()->id);

    $data = $request->except(['_token']);

    if ($request->input('newpassword') && $request->input('oldpassword')) {

        if ($request->input('newpassword') == $request->input('oldpassword')) {
            return redirect()->route('auth.perfil')->with('status.message', 'Las Contraseñas no se pueden repetir')->with('status.type', 'danger');
            
        }

        $credentials = [
            'email' => Auth::user()->email,
            'password' => $request->input('oldpassword')
        ];

        if (Auth::attempt($credentials)) {
            $data['password'] = Hash::make($request->input('newpassword'));
        } else {
            return redirect()->route('auth.perfil')->with('status.message', 'La contraseña es incorrecta')->with('status.type', 'danger');
            
        }
    }

        $oldimagen = $usuario->imagen;
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imagenName = date('YmdHis') . "_" . \Str::slug($data['nombre_usuario']) . "." . $imagen->extension();
            $imagen->move(public_path('img/perfil'), $imagenName);
            $data['imagen'] = $imagenName;
            $oldimagen = $usuario->imagen;
        } else {
            $oldimagen == null;
        }

        $usuario->update($data);

        if ($oldimagen != null && file_exists(public_path('img/perfil' . $oldimagen))) {
            unlink(public_path('img/perfil' . $oldimagen));
        }

        return redirect()->route('auth.perfil')->with('status.message', 'Tu usuario ha sido actualizado')->with('status.type', 'success');
    }

    public function banear($id)
    {
        $usuario = Usuario::find($id);

        if ($usuario && $usuario->usuarios_rol_id != 1) {
            $usuario->ban = !$usuario->ban;
            $usuario->save();
            $mensaje = ($usuario->ban) ? 'baneado' : 'desbaneado';
            return redirect()->route('admin.mangas.usuarios')->with('status.message', 'El usuario <b>' . $usuario->nombre_usuario . '</b> a sido ' . $mensaje . ' con exito')->with('status.type', 'success');
        } else {
            return redirect()->route('admin.mangas.usuarios')->with('status.message', 'Por algun motivo el usuario no a sido baneado')->with('status.type', 'danger');
        }
    }
}
