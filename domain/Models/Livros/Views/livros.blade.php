@extends('layout')

@section('title', 'Livros')

@section('content')
    <h1>Livros</h1>

    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>
@endsection
