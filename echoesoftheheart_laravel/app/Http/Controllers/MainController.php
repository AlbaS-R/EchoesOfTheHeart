<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UpdateNews;

class MainController extends Controller
{
    public function getInicio(){
        $news = UpdateNews::all();

        return view('inici.principal',['news'=>$news]);
    }
}
