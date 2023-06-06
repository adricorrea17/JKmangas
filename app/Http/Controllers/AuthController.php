<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\UsuariosPlans;

use Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function loginAccion(Request $request)
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
            return redirect()->route('admin.mangas.lista')->with('status.message', 'La sesion a sido iniciada con exito')->with('status.type', 'success');
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
        $request->validate(Usuario::VALIDACION, Usuario::MENSAJES);
        $request->validate([
            'nombre_usuario' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

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
        $usuarios = Usuario::all();
        return view('admin.mangas.usuarios', [
            'usuarios' => $usuarios
        ]);
    }

    public function ver(int $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('admin.mangas.verUsuario', [
            'usuario' => $usuario
        ]);

    }

    public function perfil(){
        
        $usuario = Auth::user();
        $UsuariosPlans = UsuariosPlans::all();

        return view('auth.perfil', [
            'UsuariosPlans' => $UsuariosPlans,
            'usuario' => $usuario
        ]);
    }
    public function perfil_edit(Request $request){
        // $request->validate(Usuario::VALIDACION, Usuario::MENSAJES);
        $usuario = Usuario::find( Auth::user()->id );

        $data = $request->except(['_token']);
        
        if( $request->input('newpassword') && $request->input('oldpassword') ) {
            
            $credentials = [
                'email' => Auth::user()->email,
                'password' => $request->input('oldpassword')
            ];

            if( Auth::attempt($credentials) ) {
                
                // aca agregamos al array que se va a hacer el update
                $data['password'] = Hash::make($request->input('newpassword'));

            } else {
                return redirect()->route('auth.perfil')->with('status.message', 'Contraseña incorrecta')->with('status.type', 'danger');
            }
        }

        $usuario->update($data);

        return redirect()->route('auth.perfil')->with('status.message', 'Tu usuario ha sido actualizado')->with('status.type', 'success');
    }
}
