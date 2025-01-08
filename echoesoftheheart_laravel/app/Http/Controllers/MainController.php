<?php

namespace App\Http\Controllers;

use App\Models\Capitulo;
use Illuminate\Http\Request;

use App\Models\UpdateNews;

class MainController extends Controller
{
    public function getInicio(){
        $news = UpdateNews::all();

        return view('inici.principal',['news'=>$news]);

    }
    public function getCapitulos(){
        $capitulos = Capitulo::all();

        return view('capitulos.p_capitulos',['capitulos'=>$capitulos]);

    }
}
