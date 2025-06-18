<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');

Route::resource('clientes', ClienteController::class)
    ->except(['show'])
    ->parameters(['clientes' => 'cliente']);
