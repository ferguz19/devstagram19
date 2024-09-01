@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        <div class="w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center">
            <img class="w-32" src="{{asset('img/usuario.png')}}" alt="imagen usuario">
        </div>
        <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-5 md:py-5">
            <p class="text-gray-700 text-xl mb-5">{{ $user->username }}</p>
            <p class="text-gray-800 text-sm mb-2 font-bold">
                0<span class="font-normal"> Seguidores</span>
            </p>
            <p class="text-gray-800 text-sm mb-2 font-bold">
                0<span class="font-normal"> Siguiendo</span>
            </p>
            <p class="text-gray-800 text-sm mb-2 font-bold">
                0<span class="font-normal"> Posts</span>
            </p>
        </div>
    </div>
</div>

<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

    @if ($posts->count())

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                    <div>
                        <a href="{{route('posts.show', ['user'=>$user, 'post'=>$post])}}">
                            <img src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                        </a>
                    </div> 
                @endforeach
        </div> 

        <div class="my-8">
            {{$posts->links('pagination::tailwind')}}
        </div>

    @else
    <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay Posts</p>
    @endif
</section>

@endsection