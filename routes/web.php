<?php

use Illuminate\Support\Facades\Route;
use Web\Models\Autenticacao\Controllers\AutenticacaoController;

Route::group([
    'as'         => 'auth.',
    'middleware' => ['guest'],
], function () {
    Route::get('/', [AutenticacaoController::class, 'indexLogin'])->name('login');
    Route::post('/login', [AutenticacaoController::class, 'login'])->name('login.store');
    Route::get('/registrar', [AutenticacaoController::class, 'indexRegistrar'])->name('registrar');
    Route::post('/registrar', [AutenticacaoController::class, 'registrar'])->name('registrar.store');
});

Route::group([
    'as'         => 'auth.',
    'middleware' => ['auth'],
], function () {
    Route::post('/logout', [AutenticacaoController::class, 'logout'])->name('logout');
});

Route::group([
    'prefix'     => 'livros',
    'as'         => 'livros.',
    'middleware' => ['auth'],
], function () {
    Route::get('/', function () {
        return view('livros::livros');
    })->name('index');
});
