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






// Procesos de autenticación
Route::post('/login', [LoginController::class, 'login'])->name('processLogin');
Route::post('/registrar', [LoginController::class, 'register'])->name('processRegister');


// grupo de paginas protegidas por auth
Route::group(['middleware' => ['auth']], function(){

//Rutas de paginas
    Route::get('/inicio', function () {return view('inici.principal');})->middleware('auth');
    Route::get('/capitulos', function () {return view('capitulos.p_capitulos');})->name('Capitulos');
    Route::get('/imagenes', function () {return view('imagenes.p_imagenes');})->name('Imagenes');
    Route::get('/personajes', function () {return view('personajes.p_personajes');})->name('Personajes');
    Route::get('/perfil', function () {return view('perfil.p_perfil');})->name('Perfil');
    Route::get('/armario', function () {return view('perfil.p_armario');})->name('Armario');
    Route::get('/juego', function () {return view('juego.p_juego');})->name('Juego');

});
