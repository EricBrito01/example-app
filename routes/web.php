<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\SelecaoController;
use Illuminate\Support\Facades\Route;

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');

Route::get('/candidatos', [CandidatoController::class, 'index'])->name('candidatos');

Route::get('/selecao', [SelecaoController::class, 'index'])->name('selecao');