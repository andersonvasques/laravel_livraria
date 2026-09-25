<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registrando o namespace das Views para cada domínio.
        View::addNamespace('auth', base_path('domain/Models/Autenticacao/Views'));
        View::addNamespace('livros', base_path('domain/Models/Livros/Views'));

        // Definindo as regras de validação de senha para a aplicação.
        Password::defaults(function () {
            return app()->isProduction()
                ? Password::min(12)
                    ->letters()       // pelo menos uma letra
                    ->mixedCase()     // maiúscula e minúscula
                    ->numbers()       // pelo menos um número
                    ->symbols()       // pelo menos um símbolo (!@#...)
                    ->uncompromised() // não pode estar em vazamentos conhecidos (consulta o haveibeenpwned)
                : Password::min(6);
        });
    }
}
