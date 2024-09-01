<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        //Modificar Request 
        $request->request->add(['username' => Str::slug($request->username)]);


        // Validacion de datos en formulario de registro
        $request->validate([
            'name' => 'required|max:40',
            'username' => 'required|unique:users|min:8|max:20',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        // Autenticar usuario
        Auth::attempt($request->only('email', 'password'));


        // Redireccionar despues de Registrar
        return redirect()->route('post.index', Auth::user()->username);
        // return redirect()->route('post.index');
    }
}
