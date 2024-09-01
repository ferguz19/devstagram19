<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Auth;

class ComentarioController extends Controller
{
    //
    public function store(Request $request, User $user, Post $post)
    {
        // Validar COmentario
        $request->validate([
            'comentario' => 'required|max:255'
        ]);


        // Almacenar el resultado 
        $comentario = new Comentario();
        $comentario->comentario = $request->comentario;
        $comentario->user_id = $user->id;
        $comentario->post_id = $post->id;
        $comentario->save();

        // Imprimir mensaje
        return back()->with('mensaje', 'Comentario realizado correctamente');
    }
}
