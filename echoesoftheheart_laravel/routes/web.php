<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;



// Rutas principales
Route::get('/', function () {return redirect('/login');});

// Vistas de login y registro y logout
Route::get('/login', function () {return view('login.login');})->name('login');
Route::get('/registrar', function () {return view('login.registro');})->name('registrar');

Route::post('/logout', function () {Auth::logout(); return redirect('/');})->name('logout');


//Vista al inicio
Route::get('/inicio', function () {return view('inici.principal');})->name('Inici');

// Procesos de autenticación
Route::post('/login', [LoginController::class, 'login'])->name('processLogin');
Route::post('/registrar', [LoginController::class, 'register'])->name('processRegister');


// grupo de paginas protegidas por auth
Route::group(['middleware' => ['auth']], function(){

    Route::get('/inicio', function () {return view('inici.principal');})->middleware('auth');

});
