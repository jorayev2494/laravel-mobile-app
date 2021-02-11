<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

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

Route::get('/', static function(): View {
    phpversion();
    phpinfo();
    return view('welcome');
});

Route::get('/test/cache', ['uses' => 'TestController@test', 'as' => 'test.cache']);
Route::get('/test/jobs/{userId}', ['uses' => 'TestController@testJobs', 'as' => 'test.cache']);
Route::get('/test/service', ['uses' => 'TestController@service', 'as' => "service"]);
Route::post('/test/test/test', ['uses' => 'TestController@testTwo', 'as' => 'test.test']);
