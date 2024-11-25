<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\LoginController;


// Rutas principales
Route::get('/', function () {return redirect('/login');});

// Vistas de login y registro
Route::get('/login', function () {return view('login.login');})->name('login');
Route::get('/registrar', function () {return view('login.registro');})->name('registrar');

// Procesos de autenticación
Route::post('/login', [LoginController::class, 'login'])->name('processLogin');
Route::post('/registrar', [LoginController::class, 'register'])->name('processRegister');


// grupo de paginas protegidas por auth
Route::group(['middleware' => ['auth']], function(){

    Route::get('/home', function () {return view('home');})->name('home');

});
