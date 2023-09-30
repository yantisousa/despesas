<?php

use App\Http\Controllers\DespesasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('autenticacao')->group(function () {
    Route::get('/', [DespesasController::class, 'index'])->name('home.user');
    Route::prefix('/despesas')->controller(DespesasController::class)->group(function () {
        Route::get('/create', 'create')->name('despesas.create');
        Route::post('/store', 'store')->name('despesas.store');
        Route::get('/edit/{despesa}', 'edit')->name('despesas.edit');
        Route::put('/update/{despesa}', 'update')->name('despesas.update');
        Route::delete('/destroy/{despesa}', 'destroy')->name('despesas.destroy');
        Route::post('/filtros', 'filtros');
    });
});

Route::prefix('/usuario')->controller(UserController::class)->group(function () {
    Route::get('/create', 'create')->name('usuario.create');
    Route::post('/store', 'store')->name('usuario.store');
    Route::get('/faq/{usuario}', 'faqs')->name('usuario.faqs');
    Route::put('/faq/response/{usuario}', 'faqsResponse')->name('usuario.faqs.response');
    Route::get('/login', 'login')->name('login');
    Route::post('/autenticacao', 'autenticacao')->name('usuario.autenticacao');
    Route::post('/logout', 'logout')->name('usuario.logout');
});
