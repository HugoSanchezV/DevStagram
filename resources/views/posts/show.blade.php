@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="contianer mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->img }}" alt="imagen de publicación {{ $post->name }}">
            <div class="p-3">
                <p>0 likes</p>
            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans() }} </p>
                <p class="mt-5"> {{ $post->description }}</p>
            </div>
        </div>

        <div class="md:w-1/2">
            <div class="shadow bg-white p-5 mb-5 ml-5">
                @auth

                    <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>

                    @if (session('message'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form action="{{ route('comments.store', ['post'=> $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comment" class="mb-2 uppercase text-gray-500 font-bold">
                                Añade un Comentario
                            </label>

                            <textarea name="comment" id="comment" cols="30" rows="7" placeholder="Agrega un Comentario"
                                class="border p-3 w-full rounded-lg @error('comment')
                    border-red-500
                    @enderror">{{ old('comment') }}</textarea>

                            @error('comment')
                                <p class="bg-red-500 text-white my-5 py-2 rounded-lg text-md text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <input type="submit" value="Comentar"
                            class="bg-sky-500 hover:bg-sky-700 
                    transition-colors 
                    cursor-pointer 
                    uppercase 
                    font-bold 
                    w-full p-3 
                    text-white 
                    rounded-lg">

                    </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-30 overflow-y-scroll mt'10">
                   @if ($post->comments->count())
                       @foreach ($post->comments as $comment)
                           <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comment->user) }}" class="font-bold">{{ $comment->user->username }}</a>
                                <p>{{ $comment->comment }}</p>
                                <p class="text-sm text-gray-500"> {{ $comment->created_at->diffForHumans() }}</p>
                           </div>
                       @endforeach
                   @else
                        <p class="p-10 text-center">No hay comentarios aún</p>
                   @endif
                </div>
            </div>
        </div>
    </div>
@endsection