<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\UpdateNews;
use App\Models\Capitulo;
use App\Models\Personaje;

class MainController extends Controller
{
    public function getInicio()
    {
        $news = UpdateNews::all();

        return view('inici.principal', ['news' => $news]);
    }
    public function getCapitulos()
    {
        $capitulos = Capitulo::all();

        return view('capitulos.p_capitulos', ['capitulos' => $capitulos]);
    }
    public function getPersonajes()
    {
        $personajes = Personaje::all();
        $relaciones = User::find(Auth::id())->personajes()->get();

        return view('personajes.p_personajes', ['personajes' => $personajes, 'relaciones' => $relaciones]);
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = User::find(Auth::id());

        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }

        $user->name = $request->name;
        $user->save();

        return response()->json(['name' => $user->name], 200);
    }

    

}
