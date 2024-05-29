@extends('layouts.app')

@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w:4/12 lg:2/12 flex justify-center flex-col items-center md:flex-row">
            <div class="w-4/12 lg:2/12 px-5">
                <img src=" {{ asset('build/assets/img/usuario.svg')}} " alt="Imgen Usuario">
            </div>

            <div class="md:w-4/12 lg:2/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10"> 
                <p class="text-gray-700 text-2xl"> {{ $user->username }} </p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal ">Seguidores</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Posts</span>
                </p>
            </div>
        </div>
    </div>
@endsection