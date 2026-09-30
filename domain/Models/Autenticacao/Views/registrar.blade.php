@extends('layout')

@section('title', 'Registrar')

@section('content')
    <h1>Registrar</h1>

    <form action="{{ route('auth.registrar.store') }}" method="POST">
        @csrf

        <label for="id_nome">Nome</label>
        <input type="text" name="name" id="id_nome" value="{{ old('name') }}" required>

        <br> <br>

        <label for="id_email">Email</label>
        <input type="email" name="email" id="id_email" value="{{ old('email') }}" required>

        <br> <br>

        <label for="id_senha">Senha</label>
        <input type="password" name="password" id="id_senha" required>

        <br> <br>

        <label for="id_senha_confirmacao">Confirmar senha</label>
        <input type="password" name="password_confirmation" id="id_senha_confirmacao" required>

        <br> <br>

        <button type="submit">Registrar</button>
    </form>
@endsection
