@extends('layouts.app')

@section('title')
    Tu Cuenta
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w:4/12 lg:2/12 md:flex justify-center">
            <div class="md:w-4/12 lg:2/12 px-5">
                <img src=" {{ asset('build/assets/img/usuario.svg')}} " alt="Imgen Usuario">
            </div>

            <div class="md:w-4/12 lg:2/12 px-5"> 
                <p class="text-gray-700 text-2xl"> {{ auth()->user()->username }} </p>
            </div>
        </div>
    </div>
@endsection