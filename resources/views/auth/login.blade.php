@extends('layouts.app')

@section('title')
    Inicia Sesión en DevStagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('build/assets/img/login.jpg') }}" alt="Imagen Login de Usuarios">
        </div>


        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                @if (session('message'))
                    <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center">
                        {{ session('message') }}
                    </p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 uppercase text-gray-500 font-bold">
                        Email
                    </label>

                    <input type="email" id="email" name="email" placeholder="Tu Email de Registro" class="border p-3 w-full rounded-lg
                    @error('email')
                        border-red-500
                    @enderror"
                    value="{{ old('email') }}"">
                    @error('email')
                        <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center
                       ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 uppercase text-gray-500 font-bold">
                        Password
                    </label>

                    <input type="password" id="password" name="password" placeholder="Password de Registro" class="border p-3 w-full rounded-lg
                    @error('password')
                        border-red-500
                    @enderror"
                    >
                    @error('password')
                        <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center
                       ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label for="remember" class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión" 
                class="bg-sky-500 hover:bg-sky-700 
                transition-colors 
                cursor-pointer 
                uppercase 
                font-bold 
                w-full p-3 
                text-white 
                rounded-lg">
                
            </form>
        </div>
    </div>
@endsection