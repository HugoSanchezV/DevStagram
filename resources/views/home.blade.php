@extends('layouts.app')

@section('title')
    Página principal
@endsection

@section('content')
   <x-list-post :posts="$posts" />
@endsection
