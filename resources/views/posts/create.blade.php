@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicacion
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

@section('contenido')
<div class="md:flex md:items-center ">
    <div class="md:w-1/2 px-10">
        <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-72 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
    </div>
    <div class="md:w-1/2 px-10 bg-white rounded-lg shadow-xl p-4 mt-10 md:mt-0">
        <form action="{{route('post.store')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="titulo" class="block uppercase text-gray-500 font-bold text-sm">Titulo</label>
                <input 
                type="text" 
                id="titulo"
                name="titulo"
                placeholder="Titulo de la publicacion"
                class="border p-2 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                value="{{old('titulo')}}"
                 >
                 @error('titulo')
                 <p class="bg-red-500 text-white rounded-md my-2 text-sm p-1 text-center">{{$message}}</p>
                 @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="block uppercase text-gray-500 font-bold text-sm">Descripcion</label>
                <textarea
                type="text" 
                id="descripcion"
                name="descripcion"
                placeholder="Escribe la descripcion de tu publicacion"
                class="border p-2 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                 >{{old('descripcion')}}</textarea>
                 @error('descripcion')
                 <p class="bg-red-500 text-white rounded-md my-2 text-sm p-1 text-center">{{$message}}</p>
                 @enderror
            </div>

            <div class="mb-5">
                    <input 
                    name="imagen"
                    type="hidden"
                    {{-- value="{{old('imagen')}}" --}}
                    />
                    @error('imagen')
                    <p class="bg-red-500 text-white rounded-md my-2 text-sm p-1 text-center">{{$message}}</p>
                    @enderror
            </div>


            <input type="submit"
            value="Publicar"
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
</div> 
@endsection