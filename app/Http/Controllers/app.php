<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class app extends Controller
{
    public function start_app(){
        $podsumowanie = "30400 zł";
        return view('app',[
            'podsumowanie' => $podsumowanie,
        ]);
    }


}
