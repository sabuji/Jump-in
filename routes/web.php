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

use App\Task;
use Illuminate\Http\Request;
// 表示処理の作成
Route::get('/', 'TasksController@index');
    

// 登録処理の作成
Route::post('/tasks', 'TasksController@store');


// 削除処理の作成
Route::post('/task/{task}', 'TasksController@destroy');

//更新画面
Route::post('/tasksedit/{task}', 'TasksController@edit');

//更新処理
Route::post('/tasks/update', 'TasksController@update');



Auth::routes();

Route::get('/home', 'TasksController@index')->name('home');
