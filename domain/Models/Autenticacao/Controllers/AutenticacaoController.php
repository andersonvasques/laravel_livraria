<?php

namespace Web\Models\Autenticacao\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Web\Models\Autenticacao\Actions\LoginAction;
use Web\Models\Autenticacao\Actions\LogoutAction;
use Web\Models\Autenticacao\Actions\RegistrarAction;

class AutenticacaoController extends Controller
{
    public function indexLogin(): View
    {
        return view('auth::login');
    }

    public function login(Request $request, LoginAction $action): RedirectResponse
    {
        return $action->handle($request);
    }

    public function logout(Request $request, LogoutAction $action): RedirectResponse
    {
        return $action->handle($request);
    }

    public function indexRegistrar(): View
    {
        return view('auth::registrar');
    }

    public function registrar(Request $request, RegistrarAction $action): RedirectResponse
    {
        return $action->handle($request);
    }
}
