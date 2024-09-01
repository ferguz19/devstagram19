@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen de la publicacion {{$post->titulo}}">
            <div class="p-3 bg-white">
                <p>0 Likes</p>
            </div>
            <div class="px-3 bg-white pb-3 ">
                <p class="font-bold">{{$post->user->username}}</p>
                <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                <p class="mt-5 mb-2">{{$post->descripcion}}</p>
            </div>
        </div>
        <div class="md:w-1/2 pl-5 pr-5 pb-5">
            <div class="shadow bg-white p-5 mb-5">

                @auth
                    
                <p class="text-xl font-bold text-center mb-4">Agregar un nuevo comentario</p>

                @if (session('mensaje'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold" >
                        {{session('mensaje')}}
                    </div>
                @endif

                <form action="{{route('comentarios.store', ['user'=>$user, 'post'=>$post])}}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="block uppercase text-gray-500 font-bold text-sm">Comentario</label>
                        <textarea
                        type="text" 
                        id="comentario"
                        name="comentario"
                        placeholder="Escribe tu comentario"
                        class="border p-2 w-full rounded-lg @error('comentario') border-red-500 @enderror"
                         ></textarea>
                         @error('comentario')
                         <p class="bg-red-500 text-white rounded-md my-2 text-sm p-1 text-center">{{$message}}</p>
                         @enderror
                    </div>
                        <input type="submit"
                        value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>

                @endauth

                <div class="bg-white shadow mt-4 mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario)
                        <div class="p-5 border-gray-100 border-b">
                            <a class="text-md font-bold" href="{{route('post.index', $comentario->user)}}">{{$comentario->user->username}}</a>
                            <p class="text-sm">{{$comentario->comentario}}</p>
                            <p class="text-sm text-gray-400">{{$comentario->created_at->diffForHumans()}}</p>
                        </div>
                        
                    @endforeach
                        
                    @else
                    <p class="p-10 text-center text-gray-400 mt-3">No hay comentarios aun.</p>
                        
                    @endif
                </div>
            </div>
        </div>
        
    </div>
    
@endsection