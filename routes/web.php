<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;




Route::resource('clientes', ClienteController::class); //cria automaticamente todas as rotas para um CRUD

Route::redirect('/','clientes'); //redireciona para pagina clientes mesmo se for acessado a URL sem /clientes