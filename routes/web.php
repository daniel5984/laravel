<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\Home\Cartazs;
use App\Http\Controllers\Home\Conteudos;
use App\Http\Controllers\Home\Palestras;
use App\Http\Controllers\Home\ProjetosAlunos;
use App\Http\Controllers\Home\Workshops;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Conteudos::class, 'index']); // Rota da página inicial
Route::get('/evento', [EventController::class, 'index']); // Rota dos Eventos
Route::get('/conteudos', [Conteudos::class, 'index']); // Rota dos Conteudos
Route::get('/cartaz', [Cartazs::class, 'index']); // Rota dos Cartaz
Route::get('/workshop', [Workshops::class, 'index']); // Rota dos Workshops
Route::get('/palestra', [Palestras::class, 'index']); // Rota das Palestras
Route::get('/information', [Conteudos::class, 'information']); // Rota das Palestras

Route::get('/projetosAlunos', [ProjetosAlunos::class, 'index'])->name('projeto.tudo'); // Rota dos Projetos dos alunos
Route::get('/projetosAlunos/modelacao', [ProjetosAlunos::class, 'modelacao'])->name('projeto.modelacao');
Route::get('/projetosAlunos/web', [ProjetosAlunos::class, 'web'])->name('projeto.web');
Route::get('/projetosAlunos/unity', [ProjetosAlunos::class, 'unity'])->name('projeto.unity');

//Route::get('/patrocinios', [Patrocinios::class, 'index']); // Rota dos Patrocinios
//Route::get('/information', [Information::class, 'index']); // Rota dos Informações

Route::get('/test', [TestController::class, 'index']); //

Route::get('/jornadas/{id}', 'App\Http\Controllers\Home\Conteudos@mudarJornadas');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/palestras', function () {
        return view('palestras');
    })->middleware('can:palestras.index')->name('palestras');

    Route::get('/jornadas', function () {
        return view('jornadas');
    })->middleware('can:jornadas.index')->name('jornadas');

    Route::get('/workshops', function () {
        return view('workshops');
    })->middleware('can:workshops.index')->name('workshops');

    Route::get('/projetos', function () {
        return view('projetos');
    })->name('projetos');

    Route::get('/cartazlive', function () {
        return view('cartazlive');
    })->name('cartazlive');

    Route::get('/permissions', function () {
        return view('permissions');
    })->name('permissions');

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->middleware('can:users.index')->only(['index', 'edit', 'update']);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);

});
