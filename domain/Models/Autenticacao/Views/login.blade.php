@extends('layout')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    @error('email')
        {{ $message }}
    @enderror

    <form action="{{ route('auth.login.store') }}" method="POST">
        @csrf

        <label for="id_email">Email</label>
        <input
            type="email"
            name="email"
            id="id_email"
            value="{{ old('email') }}"
            autocomplete="email"
            required
        >

        <br> <br>

        <label for="id_senha">Senha</label>
        <input
            type="password"
            name="password"
            id="id_senha"
            autocomplete="current-password"
            required
        >

        <br> <br>

        <label for="input_remember">Lembrar-me</label>
        <input
            type="checkbox"
            name="remember"
            id="input_remember"
            @checked(old('remember'))
        >

        <br> <br>

        <button type="submit">Entrar</button>
    </form>
@endsection
