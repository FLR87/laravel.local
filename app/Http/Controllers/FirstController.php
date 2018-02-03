<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function showAction($cat=NULL,$id= NULL){
        echo __METHOD__;
        dd($cat, $id);
    }
}
