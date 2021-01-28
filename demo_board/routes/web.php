<?php

use Illuminate\Support\Facades\Route;

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
// routes/web.php 에 정의된 라우트는 브라우저를 통해서 유입되는 라우트 URL을 정의하는데 사용
// Route::메소드('URL경로', '컨트롤러의 클래스명@메소드명'); 을 지정
// 경로가 맞다면 TaskController 클래스의 index 메소드가 실행
Route::get('/tasks/', 'TaskController@index');
Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks/', 'TaskController@store');