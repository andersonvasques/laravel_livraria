<?php

namespace Web\Models\Autenticacao\Actions;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Web\Models\User\User;

final class RegistrarAction
{
    public function __construct(
        private readonly User $modelUser
    ) {}

    public function handle(Request $request)
    {
        $dados = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', Password::defaults()],
        ]);

        $this->modelUser->create($dados);

        return redirect()->route('auth.login');
    }
}
