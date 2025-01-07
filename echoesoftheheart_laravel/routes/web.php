<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\GameController;



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
    Route::get('/inicio', [MainController::class, 'getInicio'])->name('inicio');
    Route::get('/capitulos', function () {return view('capitulos.p_capitulos');})->name('capitulos');
    Route::get('/imagenes', function () {return view('imagenes.p_imagenes');})->name('imagenes');
    Route::get('/personajes', function () {return view('personajes.p_personajes');})->name('personajes');
    Route::get('/perfil', function () {return view('perfil.p_perfil');})->name('perfil');
    Route::get('/armario', function () {return view('perfil.p_armario');})->name('armario');

    // the game
    Route::get('/juego', [GameController::class, 'play'])->name('juego');
    Route::post('/juego/siguiente', [GameController::class, 'siguiente']);


});
