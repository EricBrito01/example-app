<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\SelecaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('clientes');
    Route::get('/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/edit/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/{id}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/{id}', [ClienteController::class, 'delete'])->name('clientes.delete');
});

Route::prefix('candidatos')->group(function () {
    Route::get('/', [CandidatoController::class, 'index'])->name('candidatos');
    Route::get('/create', [CandidatoController::class, 'create'])->name('candidatos.create');
    Route::post('/', [CandidatoController::class, 'store'])->name('candidatos.store');
    Route::get('/edit/{id}', [CandidatoController::class, 'edit'])->name('candidatos.edit');
    Route::put('/{id}', [CandidatoController::class, 'update'])->name('candidatos.update');
    Route::delete('/{id}', [CandidatoController::class, 'delete'])->name('candidatos.delete');
});

Route::prefix('selecao')->group(function () {
    Route::get('/', [SelecaoController::class, 'index'])->name('selecao');
    Route::get('/create', [SelecaoController::class, 'create'])->name('selecao.create');
    Route::post('/', [SelecaoController::class, 'store'])->name('selecao.store');
    Route::get('/edit/{id}', [SelecaoController::class, 'edit'])->name('selecao.edit');
    Route::put('/{id}', [SelecaoController::class, 'update'])->name('selecao.update');
    Route::delete('/{id}', [SelecaoController::class, 'delete'])->name('selecao.delete');
});