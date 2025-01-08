<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Dialogo;
use App\Models\User;


class GameController extends Controller
{
    public function play(){
        // check if it's the first time the player is here
        $dialogo = Dialogo::first();

        // otherwise continue

        return view('juego.p_juego',['dialogo'=>$dialogo]);
    }

    public function siguiente(Request $request){
        $user = User::find(Auth::user()->id);

        if ($user->esencias <= 0){
            return response("eres pobre", 402);
        }
        else{
            $currentText = $request->textOrder;

            $response = Dialogo::where('orden', $currentText+1)->first();

            // text stuff
            $response->html = str_replace("[Nombre del usuario]", Auth::user()->name, $response->html);

            // esencias
            $user->esencias = $user->esencias-1;
            $user->save();

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

}
