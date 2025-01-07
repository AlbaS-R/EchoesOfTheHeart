<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Dialogo;


class GameController extends Controller
{
    public function play(){
        // check if it's the first time the player is here
        $dialogo = Dialogo::first();

        // otherwise continue

        return view('juego.p_juego',['dialogo'=>$dialogo]);
    }

    public function siguiente(Request $request){
        $currentText = $request->textOrder;

        $dialogo = Dialogo::where('orden', $currentText+1)->first();

        $dialogo->text = str_replace("[Nombre del usuario]", Auth::user()->name, $dialogo->text);

        return response()->json($dialogo);
    }

}
