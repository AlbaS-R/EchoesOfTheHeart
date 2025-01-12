<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\GameController;




// Rutas principales
Route::get('/', function () {return redirect('/login');});

// Vistas de login y registro y logout
Route::get('/login', function () {return view('login.login');})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('processLogin');

Route::get('/registrar', function () {return view('login.registro');})->name('registrar');
Route::post('/registrar', [LoginController::class, 'register'])->name('processRegister');

Route::get('/redirect', function () {return Socialite::driver('google')->redirect();})->name('redirect');
Route::get('/callback', [LoginController::class, 'callback']);

Route::post('/logout', function () {Auth::logout(); return redirect('/');})->name('logout');




// grupo de paginas protegidas por auth
Route::group(['middleware' => ['auth']], function(){

    //Rutas de paginas
    Route::get('/inicio', [MainController::class, 'getInicio'])->name('inicio');
    Route::get('/capitulos', [MainController::class, 'getCapitulos'])->name('capitulos');
    Route::get('/imagenes', function () {return view('imagenes.p_imagenes');})->name('imagenes');
    Route::get('/personajes', [MainController::class, 'getPersonajes'])->name('personajes');
    Route::post('/update-name', [MainController::class, 'updateName'])->middleware('auth');
    Route::get('/perfil', function () {return view('perfil.p_perfil');})->name('perfil');
    Route::get('/armario', function () {return view('perfil.p_armario');})->name('armario');

    Route::get('/progreso/{capitulo_id}', [MainController::class, 'progresoCapitulo']);
    Route::get('/reiniciar-historia/{capitulo_id}', [MainController::class, 'reiniciarProgreso'])->name('reiniciar.historia');
    // the game
    Route::get('/juego', [GameController::class, 'play'])->name('juego');
    Route::post('/juego/siguiente', [GameController::class, 'siguiente']);
    Route::post('/juego/decision', [GameController::class, 'decision']);

});
