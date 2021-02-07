<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

Route::get('/introduction', function () {
    return view('introduction');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/Member_registration', function () {
    return view('Member_registration');
});

Route::get('/mypage', function () {
    return view('mypage');
});

Route::get('/price', function () {
    return view('price');
});

Route::get('/manager', function () {
    return view('manager.index');
});

Route::get('/manager/shift_management', function () {
    return view('manager.shift_management');
});


// routes/web.php 에 정의된 라우트는 브라우저를 통해서 유입되는 라우트 URL을 정의하는데 사용
// Route::메소드('URL경로', '컨트롤러의 클래스명@메소드명'); 을 지정
// 경로가 맞다면 TaskController 클래스의 index 메소드가 실행

// 예약 기능 컨트롤러
use App\Http\Controllers\AppointController;

Route::get('/appoint', [AppointController::class,'index']); 

Route::get('/appoint/create',  [AppointController::class,'create']); 

Route::get('/appoint/designer',  [AppointController::class,'designer']); 

Route::post('/appoint',  [AppointController::class,'store']); 

Route::get('/manager/appo_calender', [AppointController::class,'appo_calender']); 

Route::get('/manager/appo_management', [AppointController::class,'appo_management']); 

Route::post('/manager/appo_management',  [AppointController::class,'appo_delete']); 

// 시프트 관리 기능 컨트롤러
use App\Http\Controllers\ShiftController;

Route::get('/manager/shift_calender', [ShiftController::class,'shift_calender']); 

