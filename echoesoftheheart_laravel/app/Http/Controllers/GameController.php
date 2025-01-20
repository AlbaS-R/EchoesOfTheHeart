<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Dialogo;
use App\Models\User;


class GameController extends Controller
{
    public function play()
    {
        // get saved dialog (if exists)
        $user = User::find(Auth::id());
        $progreso = $user->progreso()->get();

        // check if it really exists
        if ($progreso->isEmpty()) {

            $dialogo = Dialogo::find(1);
            if (!$dialogo) {
                return response()->json(['error' => 'El diálogo inicial no existe en la base de datos.'], 400);
            }


            $user->progreso()->create([
                'dialogo_id' => 1,
                'capitulo_id' => 1,
            ]);
        }

        // get the dialog id
        $progreso = $user->progreso()->first()->dialogo_id -1;

        return view('juego.p_juego', ['progreso' => $progreso,]);
    }

    public function siguiente(Request $request)
    {
        $user = User::find(Auth::user()->id);

        // check esencias
        if ($user->esencias <= 0) {
            return response("eres pobre", 402);
        }

        $currentText = $request->textOrder;

        if($currentText == 0){
            $next_dialog = Dialogo::where('orden_origen', $currentText+1)->first();
        }
        else{
            $current_dialog = Dialogo::where('orden_origen', $currentText)->first();

            $next_dialog = Dialogo::where('orden_origen', $current_dialog->orden_destino)->first();
        }


        if($next_dialog->es_opcion){

            $choice1 = array(
                'html' => $next_dialog->html,
                'destination' => $next_dialog->orden_destino,
            );

            // vamos a asumir que solo hay dos deciciones :)
            $next_next_dialog = Dialogo::where('orden_origen', $current_dialog->orden_destino)->skip(1)->first();
            $choice2 = array(
                'html' => $next_next_dialog->html,
                'destination' => $next_next_dialog->orden_destino,
            );

            $next_dialog->choices = [$choice1,$choice2];

            unset($next_dialog->html);
        }
        else{
            // reemplazar con nombre de usuario
            $next_dialog->html = str_replace("[Nombre del usuario]", Auth::user()->name, $next_dialog->html);
        }

        // ejecutar PHP
        eval($next_dialog->php);
        unset($next_dialog->php);


        // restar esencias solo si no es la primera carga de la pagina
        $progreso = User::find(Auth::id())->progreso()->first();

        if ($currentText != $progreso->dialogo_id - 1) {
            $user->esencias = $user->esencias - 1;
            $user->save();
        }

        if(!$next_dialog->es_opcion){
            // actualizar el progreso
            $progreso->dialogo_id = $currentText + 1;
            $progreso->save();
        }

        $next_dialog->esencias = $user->esencias;
        return response()->json($next_dialog);
    }


    public function decision(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user->esencias <= 0) {
            return response("eres pobre", 402);
        }


        $response = Dialogo::where('orden_origen', $request->id)->first();


        $response->html = str_replace("[Nombre del usuario]", Auth::user()->name, $response->html);


        $user->esencias -= 1;
        $user->save();


        $progreso = $user->progreso()->first();
        $progreso->dialogo_id = $request->id;
        $progreso->save();


        $response->esencias = $user->esencias;
        return response()->json($response);
    }
}
