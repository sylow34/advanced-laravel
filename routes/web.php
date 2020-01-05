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

Route::get('/', function () {
    return view('welcome');
});

Route::get('pay', 'PayOrderController@store');
Route::get('channel', 'ChannelController@index');
Route::get('posts/create', 'PostController@create');
Route::get('posts', 'PostController@index');
Route::get('refNumber', function () {
    //dd(\Illuminate\Support\Str::refNumber('7664w202885261bb'));
    dd(\Illuminate\Support\Str::refNumber('7664w202885261bb'));

    return \Illuminate\Support\Facades\Response::errorJson();
});
Route::get('customers', 'CustomerController@index');
Route::get('filter', 'CustomerController@pipeline');
Route::get('/customer/{customerId}', 'CustomerController@show');
Route::get('/customer/{customerId}/update', 'CustomerController@update');
Route::get('/customer/{customerId}/delete', 'CustomerController@destroy');

Route::get('lazy', function () {
/*    $collection = \Illuminate\Database\Eloquent\Collection::times(1000000000)
        ->map(function ($times) {
            return pow(2, $times);
        })->all();*/


    $collection = \Illuminate\Support\LazyCollection::times(1000000000)
        ->map(function ($times) {
            return pow(2, $times);
        })->all();
    return 'done';

});

Route::get('generator',function (){
    function happy($string){
     for ($i=0;$i<$string;$i++){
         yield $i;
     }
    }

    foreach (happy(1000000) as $item){
        dump($item);
    }

});
