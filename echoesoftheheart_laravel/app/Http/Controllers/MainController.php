<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\UpdateNews;
use App\Models\Capitulo;
use App\Models\Personaje;
use App\Models\Dialogo;


class MainController extends Controller
{
    public function getInicio()
    {
        $news = UpdateNews::all();

        // progressbar
        $user = User::find(Auth::user()->id);
        $capitulo_id = $user->progreso()->first()->capitulo_id;

        $totalDialogos = Dialogo::where('capitulo_id', $capitulo_id)->count();
        $progreso = $user->progreso()->where('capitulo_id', $capitulo_id)->first();
        if (!$progreso || $totalDialogos == 0) {
            $progreso = 0;
        }
        $porcentaje = ($progreso->dialogo_id / $totalDialogos) * 100;
        $progreso = round($porcentaje, 2);

        return view('inici.principal', ['news' => $news, 'progreso' => $progreso]);
    }
    public function getCapitulos()
    {

        $capitulos = Capitulo::all();

        //progress
        foreach ($capitulos as $capitulo) {
            $user = User::find(Auth::user()->id);
            $capitulo_id = $user->progreso()->first()->capitulo_id;

            $totalDialogos = Dialogo::where('capitulo_id', $capitulo_id)->count();
            $progreso = $user->progreso()->where('capitulo_id', $capitulo_id)->first();
            if (!$progreso || $totalDialogos == 0) {
                $progreso = 0;
            }
            $porcentaje = ($progreso->dialogo_id / $totalDialogos) * 100;
            $progreso = round($porcentaje, 2);
        }

        return view('capitulos.p_capitulos', ['capitulos' => $capitulos, 'progreso' => $progreso]);
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

    public function obtenerProgreso($capitulo_id)
    {
        $user = User::find(Auth::user()->id);


        $totalDialogos = Dialogo::where('capitulo_id', $capitulo_id)->count();


        $progreso = $user->progreso()->where('capitulo_id', $capitulo_id)->first();

        if (!$progreso || $totalDialogos == 0) {
            return 0;
        }


        $porcentaje = ($progreso->dialogo_id / $totalDialogos) * 100;

        return round($porcentaje, 2);
    }

    public function progresoCapitulo($capitulo_id)
    {
        $progreso = $this->obtenerProgreso($capitulo_id);

        return response()->json(['progreso' => $progreso]);
    }
}
