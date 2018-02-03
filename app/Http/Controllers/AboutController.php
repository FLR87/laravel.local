<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AboutController extends Controller
{
    public function showAction(Request $request){
        $data=[
            'title'=>'MyTitle',
            'test'=>'11111'

        ];

        $array = $request->only(['test']);
        dd($array);
//        dd($request->all());
        return view('about',$data);

    }
}
