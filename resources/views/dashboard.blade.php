@extends('layouts.app')

@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w:4/12 lg:2/12 flex justify-center flex-col items-center md:flex-row">
            <div class="w-4/12 lg:2/12 px-5">
                <img src=" {{ asset('build/assets/img/usuario.svg') }} " alt="Imgen Usuario">
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

    <section class="container mx-auto my-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">


                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', ['user' => $user->username, 'post' => $post]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->img }}" alt="img del post {{ $post->title }}">
                        </a>
                    </div>
                @endforeach


            </div>
            <div class="flex justify-end my-10">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-gray-600 text-sm uppercase text-center font-bold">No hay posts</p>
        @endif

    </section>
@endsection
