<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

Route::get('/introduction', function () {
    return view('introduction');
});

Route::get('/login/login', function () {
    return view('login.login');
});

Route::get('/login/register', function () {
    return view('login.register');
});

Route::get('/manager/member_management', function () {
    return view('manager.member_management');
});


// routes/web.php 에 정의된 라우트는 브라우저를 통해서 유입되는 라우트 URL을 정의하는데 사용
// Route::메소드('URL경로', '컨트롤러의 클래스명@메소드명'); 을 지정
// 경로가 맞다면 TaskController 클래스의 index 메소드가 실행


// 예약 기능 컨트롤러
use App\Http\Controllers\AppointController;

// 예약기능
Route::get('/appoint', [AppointController::class,'index']); 

Route::get('/appoint/create',  [AppointController::class,'create']); 

Route::get('/appoint/designer',  [AppointController::class,'designer']); 

Route::post('/appoint',  [AppointController::class,'store']);

// 관리자 예약관리기능
Route::get('/manager', [AppointController::class,'management']); 

Route::post('/manager', [AppointController::class,'management_delete']); 

Route::get('/manager/appo_calender', [AppointController::class,'appo_calender']); 

Route::get('/manager/appo_management', [AppointController::class,'appo_management']); 

Route::post('/manager/appo_management',  [AppointController::class,'appo_delete']); 

// 유저 예약관리기능
Route::get('/mypage', [AppointController::class,'mypage']);

Route::post('/mypage',  [AppointController::class,'mypage_delete']);


// 시프트 관리 기능 컨트롤러
use App\Http\Controllers\ShiftController;

// 시프트 관리 기능
Route::get('/manager/shift_management', [ShiftController::class,'shift_management']);

Route::post('/manager/shift_management', [ShiftController::class,'shift_store']);

Route::get('/manager/shift_calender', [ShiftController::class,'shift_calender']); 

// 로그인,회원가입
use App\Http\Controllers\MemberController;

Route::post('/login/login',[MemberController::class,'member_login']);

Route::post('/login/register', [MemberController::class,'member_register']);

Route::get('/login/logout',[MemberController::class,'logout']);

Route::get('/login/password_set',[MemberController::class,'password_find']);

Route::post('/login/password_set',[MemberController::class,'password_reset']);

// 유저 관리 및 탈퇴
Route::get('/mypage/delete_member', [MemberController::class,'delete_member']);

Route::get('/manager/member_management', [MemberController::class,'member_management']);

Route::post('/manager/member_management', [MemberController::class,'members_delete']);

use App\Http\Controllers\MailController;

Route::get('mail', [MailController::class, 'send']);