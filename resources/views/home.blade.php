@extends('layouts.app')

@section('title')
    Página principal
@endsection

@section('content')
    @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">

        @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->img }}" alt="img del post {{ $post->title }}">
                </a>
            </div>
        @endforeach

    </div>
    <div class="flex justify-end my-10">
        {{ $posts->links() }}
    </div>
    @else
        <p>No hay Posts, sigue a alguien para poder mostrar sus posts </p>
    @endif
    
@endsection
