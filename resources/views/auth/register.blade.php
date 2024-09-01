@extends('layouts.app')

@section('titulo')
Registrate en DevStagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-8 md:items-center">
    {{-- <div class="md:w-6/12 p-5">
        <img src="{{asset('img/registrar.jpg')}}" alt="imagen registro de usuarios">
    </div> --}}
    <div class="md:w-7/12 bg-white rounded-lg shadow-xl p-6">
        <form action="{{route('register')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="name" class="block uppercase text-gray-500 font-bold text-sm">Nombre</label>
                <input 
                type="text" 
                id="name"
                name="name"
                placeholder="Tu nombre"
                class="border p-2 w-full rounded-lg @error('name') border-red-500 @enderror"
                value="{{old('name')}}"
                 >
                 @error('name')
                 <p class="bg-red-500 text-white rounded-md my-2 text-sm p-1 text-center">{{$message}}</p>
                 @enderror
            </div>
            <div class="mb-5">
                <label for="username" class="block uppercase text-gray-500 font-bold text-sm">Username</label>
                <input 
                type="text" 
                id="username"
                name="username"
                placeholder="Tu nombre de usuario"
                class="border p-2 w-full rounded-lg @error('username') border-red-500 @enderror"
                value="{{old('username')}}"
                 >
                 @error('username')
                 <p class="bg-red-500 text-white rounded-md my-2 text-sm p-1 text-center">{{$message}}</p>
                 @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="block uppercase text-gray-500 font-bold text-sm">Email</label>
                <input 
                type="email" 
                id="email"
                name="email"
                placeholder="Tu email de registro"
                class="border p-2 w-full rounded-lg @error('email') border-red-500 @enderror"
                value="{{old('email')}}"
                 >
                 @error('email')
                 <p class="bg-red-500 text-white rounded-md my-2 text-sm p-1 text-center">{{$message}}</p>
                 @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="block uppercase text-gray-500 font-bold text-sm">Password</label>
                <input 
                type="password" 
                id="password"
                name="password"
                placeholder="Password de registro"
                class="border p-2 w-full rounded-lg @error('password') border-red-500 @enderror"
                 >
                 @error('password')
                 <p class="bg-red-500 text-white rounded-md my-2 text-sm p-1 text-center">{{$message}}</p>
                 @enderror
            </div>
            <div class="mb-5">
                <label for="password_confirmation" class="block uppercase text-gray-500 font-bold text-sm">Repetir Password</label>
                <input 
                type="password" 
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Repite tu password"
                class="border p-2 w-full rounded-lg"
                 >
            </div>
            <input type="submit"
            value="Crear cuenta"
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
</div>
@endsection