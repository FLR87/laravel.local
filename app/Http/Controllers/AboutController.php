<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    protected static $tasks;

    public function addTasks($array){
        return self::$tasks[] = $array;

    }

    public function showAction(Request $request)
        {
//            if (view()->exists('tasks'))
//                $tasks = DB::table('tasks')->first();
//                $tasks = DB::table('tasks')->pluck('');
//        $tasks = DB::table('tasks')
//            ->where('id','>',5)
//            ->get();
//            $tasks = DB::table('tasks')->where('id',3)->value('id');
//            dd($tasks);

            DB::table('tasks')->orderBy('id')->chunk(2,function($tasks){
                foreach ($tasks as $task){
                    AboutController::addTasks($task);
                };
            });
            dd(self::$tasks);

        }
        //        $data=[
//            'title'=>'MyTitle',
//            'test'=>'11111'
//
//        ];
//
//        $array = $request->only(['test']);
//        dd($array);
////        dd($request->all());
//        return view('about',$data);
//
//    }
}
