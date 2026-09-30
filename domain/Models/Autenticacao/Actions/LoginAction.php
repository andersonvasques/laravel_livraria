<?php

namespace Web\Models\Autenticacao\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class LoginAction
{
    public function handle(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember    = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('livros.index'));
        }

        return back()
            ->withErrors([
                'email' => 'E-mail ou Senha inválidos.',
            ])
            ->onlyInput(
                'email',
                'remember'
            );
    }
}
