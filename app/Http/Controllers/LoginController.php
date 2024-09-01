<?php

namespace App\Http\Controllers;

//use Illuminate\Container\Attributes\Auth;     Desactivo estas para que funcione con el otro Auth
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Intento de autenticación con opción de "recordar"
        if (!Auth::attempt(
            ['email' => $request->email, 'password' => $request->password],
            $request->remember
        )) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }
        // Si todo sale bien, redirige a la ruta que se definió en el
        return redirect()->route('post.index', Auth::user()->username); // Redirecciona a la ruta post.index
    }
}