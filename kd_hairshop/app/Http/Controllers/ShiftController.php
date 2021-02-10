<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use App\Task를 하면 모델인 Task 클래스를 상속받는다.
use App\Shift; // 테이블명 지정

class ShiftController extends Controller
{
    //시프트 관리 메소드
    public function shift_management(Request $request) 
    {
        // $date 값이 없으면 현재 날짜
        $date = $_GET['date'];

        $designers = Shift::where('date', $date)->get();
        $designer_name = array('staff_1'=>'天海 春香', 'staff_2'=>'如月 千早', 'staff_3'=>'星井 美希', 'staff_4'=>'萩原 雪歩' ,'staff_5'=>'四条 貴音', 'staff_6'=>'水瀬 伊織');
        $designer_info = array('staff_1'=>'脱毛専門のデザイナー', 'staff_2'=>'女性カット専門のデザイナー', 'staff_3'=>'男性カット専門のデザイナー', 'staff_4'=>'カラー専門のデザイナー' ,'staff_5'=>'パーマ専門
        のデザイナー', 'staff_6'=>'一番綺麗なデザイナー');

        return view('manager.shift_management', [
            'designers'=>$designers,
            'designer_info'=>$designer_info,
            'designer_name'=>$designer_name,
            'date'=>$date
        ]);
    }

    //시프트 저장 메소드
    public function shift_store(Request $request) 
    {
        $date = $request->input('date'); // 날짜
        $designer = $request->input('designer'); // 디자이너

        if($request->input('checked') != NULL) {
            $checked = $request->input('checked');
            for($i=0; $i<6; $i++){
                $staffs[$i] = 'off';
                $staff = 'staff_'.($i+1);
                foreach($checked as $check){
                    if($staff==$check){
                        $staffs[$i] = 'on';
                    }
                }
            }
        } else {
            for($i =1; $i<7; $i++){
                $staffs[$i] = 'off';
            }
        }   

        // update 구문인지 아닌지를 구분하기 위한 쿼리설정
        $designers = Shift::where('date', $date)->get();

        $count = 0;
        // 일치하는 date가 있을 시에 update 구문으로 작동
        foreach($designers as $designer){
            $i=1;
            foreach($staffs as $staff){
                if($staff == 'on'){
                    $staff_ = 'staff_'.$i; 
                    Shift::where('date', $date)->update([ $staff_ => $staff]);
                } else {
                    $staff_ = 'staff_'.$i; 
                    Shift::where('date', $date)->update([ $staff_ => NULL]);
                }
                $i++;
            }
            $count = 1;
        } 
        // 일치하는 date가 없을 시에 구문을 새로 생성 작동
        if($count == 0){
            Shift::get();
            // date가 이미 있을 경우에는 update
            $Shift = new Shift;
            $Shift->date = $date;
            $i=1;
            foreach($staffs as $staff){
                if($staff == 'on'){
                    $staff_ = 'staff_'.$i; 
                    $Shift->$staff_  = $staff;
                }
                $i++;
            }
            $Shift->save();
        }


        Alert::success('シフト管理完了', 'シフト管理を済ませました。');

        return redirect("/manager/shift_calender");
        // $date 값이 없으면 현재 날짜
    }

    // use Illuminate\Http\Request 클래스의 변수
    public function shift_calender(Request $request) // Request 클래스의 변수 매개변수로 사용
    {
        date_default_timezone_set('Asia/Seoul');
        
        if (!isset($cellh)){
            $cellh = 70; // date cell height
         }
        if (!isset($tablew)){
             $tablew = 650; //table width
        }    
        $cellw = 130; // date cell width
        //---- 오늘 날짜
        $thisyear = date('Y'); // 4자리 연도
        $thismonth = date('n'); // 0을 포함하지 않는 월
        $today = date('j'); // 0을 포함하지 않는 일
    
         // $year, $month 값이 없으면 현재 날짜
        $year = isset($_GET['year']) ? $_GET['year'] : $thisyear;
        $month = isset($_GET['month']) ? $_GET['month'] : $thismonth;
        $day = isset($_GET['day']) ? $_GET['day'] : $today;
        //------ 날짜의 범위 체크
        if (($year > 2041) or ($year < 2021))
            ErrorMsg("연도는 2021 ~ 2038년만 가능합니다.");
    
        // 년,월 이동 기능
        $prev_month = $month - 1;
        $next_month = $month + 1;
        $prev_year = $next_year = $year;
        if ($month == 1) {
            $prev_month = 12;
            $prev_year = $year - 1;
        } else if ($month == 12) {
            $next_month = 1;
            $next_year = $year + 1;
        }
        $prevyear = $year - 1;
        $nextyear = $year + 1;
    
        // mktime 함수는 연도, 월, 일, 시, 분, 초를 받아서 타임스탬프값을 만들어 리턴하는 역활을 합니다.
        // mktime([시간], [분], [초], [월], [일], [연도]); 
        // 't'는 주어진 월의 일수를 구하는 형식 문자
        // 1. 총일수 구하기
        $last_day = date('t', mktime(0, 0, 0, $month, 1, $year));
        // 2. 시작요일 구하기
        $start_week = date("w", mktime(0, 0, 0, $month, 1, $year)); // 일요일 0, 토요일 6
    
        // 3. 총 몇 주인지 구하기
        $total_week = ceil(($last_day + $start_week) / 7);
    
        // 4. 마지막 요일 구하기
        $last_week = date('w', mktime(0, 0, 0, $month, $last_day, $year));
    
        // 요청된 정보 처리 후 결과 되돌려줌
        return view('manager.shift_calender', [
            'cellh'=>$cellh,
            'tablew'=>$tablew,
            'cellw'=>$cellw,
            'thisyear'=>$thisyear,
            'thismonth'=>$thismonth,
            'today'=>$today,
            'year'=>$year,
            'month'=>$month,
            'day'=>$day,
            'prev_month'=>$prev_month,
            'prevyear'=>$prevyear,
            'prev_year'=>$prev_year,
            'next_month'=>$next_month,
            'nextyear'=>$nextyear,
            'next_year'=>$next_year,
            'last_day'=>$last_day,
            'start_week'=>$start_week,
            'total_week'=>$total_week,
            'last_week'=>$last_week
        ]);
    }   
}
