<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Dialogo;
use App\Models\User;
use App\Models\Progreso;


class GameController extends Controller
{
    public function play(){
        // get saved dialog (if exists)
        $user = User::find(Auth::id());
        $progreso = $user->progreso()->get();

        // check if it really exists
        if ($progreso->isEmpty()){
            // attach a progress to the user (set to the first chapter and dialog)
            $user->progreso()->create([
                'dialogo_id' => '1',
                'capitulo_id' => '1',
            ]);

        }

        // get the dialog id
        $progreso = $user->progreso()->first()->dialogo_id-1;

        return view('juego.p_juego',['progreso'=>$progreso,]);
    }

    public function siguiente(Request $request){
        $user = User::find(Auth::user()->id);

        if ($user->esencias <= 0){
            return response("eres pobre", 402);
        }
        else{
            $currentText = $request->textOrder;
            $response = Dialogo::where('orden', $currentText+1)->first();

            // text replacements (username)
            $response->html = str_replace("[Nombre del usuario]", Auth::user()->name, $response->html);


            $progreso = User::find(Auth::id())->progreso()->first();
            // restar esencias solo si no es la primera carga de la pagina
            if ($currentText != $progreso->dialogo_id-1){
                $user->esencias = $user->esencias-1;
                $user->save();
            }
            // actualizar el progreso
            $progreso->dialogo_id = $currentText+1;
            $progreso->save();



            $response->esencias = $user->esencias;

            return response()->json($response);
        }
    }

    public function decision(Request $request){
        $user = User::find(Auth::user()->id);

        if ($user->esencias <= 0){
            return response("eres pobre", 402);
        }
        else{
            $currentText = $request->textOrder;

            $response = Dialogo::where('orden', $request->id)->first();

            // text stuff
            $response->html = str_replace("[Nombre del usuario]", Auth::user()->name, $response->html);

            // esencias
            $user->esencias = $user->esencias-1;
            $user->save();

            $response->esencias = $user->esencias;

            return response()->json($response);
        }
    }

    public function obtenerProgreso($capitulo_id) {
        $user = User::find(Auth::user()->id);

        // Obtener el total de diálogos del capítulo
        $totalDialogos = Dialogo::where('capitulo_id', $capitulo_id)->count();

        // Obtener el progreso del usuario en el capítulo
        $progreso = $user->progreso()->where('capitulo_id', $capitulo_id)->first();

        if (!$progreso || $totalDialogos == 0) {
            return 0; // Sin progreso o diálogos
        }

        // Calcular el porcentaje del progreso
        $porcentaje = ($progreso->dialogo_id / $totalDialogos) * 100;

        return round($porcentaje, 2); // Redondear a dos decimales
    }
    
    public function progresoCapitulo($capitulo_id)
    {
        $progreso = $this->obtenerProgreso($capitulo_id);

        return response()->json(['progreso' => $progreso]);
    }


}
