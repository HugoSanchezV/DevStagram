@extends('layouts.app')

@section('title')
    Editar Perfil : {{ auth()->user()->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('profile.store') }}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 uppercase text-gray-500 font-bold">
                        Username
                    </label>

                    <input type="text" id="username" name="username" placeholder="Tu Nombre de Usuario" class="border p-3 w-full rounded-lg  
                    @error('username')
                        border-red-500
                    @enderror"
                    value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center
                       ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="img" class="mb-2 uppercase text-gray-500 font-bold">
                        Imagen de Perfil
                    </label>

                    <input type="file" id="img" name="img" class="border p-3 w-full rounded-lg  
                    value=""
                    accept=".png, .jpg, .jpeg">
                    
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 uppercase text-gray-500 font-bold">
                        Email
                    </label>

                    <input type="text" id="email" name="email" placeholder="Escribe tu Email" class="border p-3 w-full rounded-lg  
                    @error('email')
                        border-red-500
                    @enderror"
                    value="{{ auth()->user()->email }}">
                    @error('email')
                        <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center
                       ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <label for="current_password" class="flex mb-5 uppercase text-gray-600 font-bold">
                            Cambiar Password
                </label>

                <div class="mb-5">
                    
                    <label for="current_password" class="mb-2 uppercase text-gray-500 font-bold">
                        Password Actual
                    </label>

                    <input type="password" id="current_password" name="current_password" placeholder="Escribe tu Password" class="border p-3 w-full rounded-lg  
                    @error('current_password')
                        border-red-500
                    @enderror">
                    @error('current_password')
                        <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-5">
                    
                    <label for="password" class="mb-2 uppercase text-gray-500 font-bold">
                        Nuevo Password
                    </label>

                    <input type="password" id="password" name="password" placeholder="Nuevo Password" class="border p-3 w-full rounded-lg  
                    @error('password')
                        border-red-500
                    @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center
                       ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-5">
                    
                    <label for="password_confirmation" class="mb-2 uppercase text-gray-500 font-bold">
                        Password Actual
                    </label>

                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Escribe tu Password" class="border p-3 w-full rounded-lg  
                    @error('password_confirmation')
                        border-red-500
                    @enderror">
                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center
                       ">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <input type="submit" value="Guardar Cambios" 
                class="bg-sky-500 hover:bg-sky-700 
                transition-colors 
                cursor-pointer 
                uppercase 
                font-bold 
                w-full p-3 
                text-white 
                rounded-lg
                mt-5">
                
            </form>
        </div>
    </div>
@endsection