<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

Route::get('/introduction', function () {
    return view('introduction');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/Member registration', function () {
    return view('Member registration');
});

Route::get('/mypage', function () {
    return view('mypage');
});

Route::get('/price', function () {
    return view('price');
});


// routes/web.php 에 정의된 라우트는 브라우저를 통해서 유입되는 라우트 URL을 정의하는데 사용
// Route::메소드('URL경로', '컨트롤러의 클래스명@메소드명'); 을 지정
// 경로가 맞다면 TaskController 클래스의 index 메소드가 실행

use App\Http\Controllers\AppointController;

Route::get('/appoint', [AppointController::class,'index']); 

Route::get('/appoint/create',  [AppointController::class,'create']); 

Route::get('/appoint/designer',  [AppointController::class,'designer']); 

Route::post('/appoint',  [AppointController::class,'store']); 