<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'widget'], function(){
    Route::group([ 'middleware' =>  ['request.type','after.middleware']], function() {
        Route::get('/', 'WidgetsController@index');
        Route::post('/create', 'WidgetsController@store');  
        Route::get('/detail/{id}', 'WidgetsController@show'); 
        Route::delete('/delete/{id}', 'WidgetsController@destroy'); 
        Route::patch('/update-name/{id}/{name}', 'WidgetsController@update_name');
    });
});
