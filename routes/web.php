<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', ['as'=>'home', function () {
    return view('welcome');
}]);

Route::resources(['tasks'=>'TaskController']);

//Route::get('/about/{cat?}/{id?}', ['uses' => 'FirstController@showAction', 'as'=>'FirstController']);

//Route::get('/article/{cat?}/{id?}', ['as' => 'article', function ($cat = NULL, $id = NULL) {
//    dd($cat, $id);
//    dd($_ENV);
//    dd(config('app.locale'));
//    Config::set('app.locale','ru');
//    echo Config::get('app.locale');
//    echo $id;
//}])->where('cat','[a-z]+');
//}])->where(['cat' => '[a-z]+', 'id' => '[0-9]+']);

Route::post('/page',function(){
    dd($_POST);
});
Route::match(['get','post'],'/page', function(){
    dd(1111);
});

Route::group(['prefix'=>'admin'], function(){
    Route::get('/page/create/{id}', function ($id){
//        echo __METHOD__;
        dd(111);
    });
    Route::get('page/edit', function(){
        return redirect()->route('home');
    });

});

Route::get('/page/{cat}/{id}',function ($var1){
    echo $var1;
});
//Router::get('/about/{id?}'d)
Route::get('/about',['as'=>'about','uses'=>'AboutController@showAction']);

Route::resources(['article'=>'ArticleController']);




