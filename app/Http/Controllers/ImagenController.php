<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        $manager = new ImageManager(new Driver());


        $imagenServidor = $manager::imagick()->read($imagen);
        $imagenServidor->cover(1000, 1000); // Redimensionar la imagen

        $imagenPath = public_path('uploads') . '/' . $nombreImagen; // Ruta donde se guardará la imagen
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}