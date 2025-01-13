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
    $progreso = $user->progreso()->first();

    //Para checkear si esta null el capitulo_id que haga que progreso sea 0, si no, le da el progreso.
    if (!$progreso) {

        $capitulo_id = null;
        $progreso = 0;
    } else {
        $capitulo_id = $progreso->capitulo_id;
    }

    if ($capitulo_id !== null) {
        $totalDialogos = Dialogo::where('capitulo_id', $capitulo_id)->count();
        if ($totalDialogos > 0) {
            $porcentaje = ($progreso->dialogo_id / $totalDialogos) * 100;
            $progreso = round($porcentaje, 2);
        } else {
            $progreso = 0;
        }
    } else {

        $progreso = 0;
    }

    return view('inici.principal', ['news' => $news, 'progreso' => $progreso]);
    }
    public function getCapitulos()
    {

        $capitulos = Capitulo::all();

        //progress
        foreach ($capitulos as $capitulo) {
            $user = User::find(Auth::user()->id);
            $progreso = $user->progreso()->first();

            if (!$progreso) {
                $capitulo_id = null;
                $progreso = 0;
            } else {
                $capitulo_id = $progreso->capitulo_id;
            }

            if ($capitulo_id !== null) {
                $totalDialogos = Dialogo::where('capitulo_id', $capitulo_id)->count();
                if ($totalDialogos > 0) {
                    $porcentaje = ($progreso->dialogo_id / $totalDialogos) * 100;
                    $progreso = round($porcentaje, 2);
                } else {
                    $progreso = 0;
                }
            } else {
                $progreso = 0;
            }
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
        $progreso = $user->progreso()->where('capitulo_id', $capitulo_id)->first();


        if (!$progreso) {
            return 0;
        }

        $totalDialogos = Dialogo::where('capitulo_id', $capitulo_id)->count();
        if ($totalDialogos == 0) {
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

    public function reiniciarProgreso($capitulo_id){
    $user = User::find(Auth::id());
    $progreso = $user->progreso()->where('capitulo_id', $capitulo_id)->first();

    if ($progreso) {

        if ($progreso->reinicios >= 5) {
            return redirect()->route('capitulos')->with('error', 'Has alcanzado el límite de reinicios para este capítulo.');
        }

        $progreso->reinicios += 1;

        $progreso->dialogo_id = 1;
        $progreso->save();
    }

    return redirect()->route('capitulos')->with('success', 'Capítulo reiniciado exitosamente.');
    }

    public function paginaImagen(){
        $user = User::find(Auth::id());
        $imagenes = $user->imagenes()->get();


        return view('imagenes.p_imagenes', ['imagenes' => $imagenes]);

    }


}
