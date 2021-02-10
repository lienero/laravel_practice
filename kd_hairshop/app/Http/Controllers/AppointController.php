<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use App\Task를 하면 모델인 Task 클래스를 상속받는다.
use App\Appoint; // 테이블명 지정
use App\Shift; // 테이블명 지정

class AppointController extends Controller
{
    // use Illuminate\Http\Request 클래스의 변수
    public function index(Request $request) // Request 클래스의 변수 매개변수로 사용
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


        // appoints 를 선언하고 변수 안에 쿼리빌더의 결과를 넣는다.
        // 테이블은 Appoint 테이블
        $appoints = Appoint::get();

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

        return view('appoint.index', [
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
            'appoints'=>$appoints,
            'last_day'=>$last_day,
            'start_week'=>$start_week,
            'total_week'=>$total_week,
            'last_week'=>$last_week
            ]);
            // 요청된 정보 처리 후 결과 되돌려줌

    }
    public function create() //생성페이지 메소드
    {
        date_default_timezone_set('Asia/Seoul');

        $date = isset($_GET['date']) ? $_GET['date'] : 'x';
        $designer = isset($_GET['designer']) ? $_GET['designer'] : 'x';
        $time = isset($_GET['time']) ? $_GET['time'] : 'x';
        $datetime = $date." ".$time; 
        $strto_date = strtotime($datetime.'+30 minutes');
        // date("Y-m-d h:i:s", $strto_appoint_end[$l]); : 변수를 date Y-m-d h:i:s 형식으로 변경
        $strto_date = date("Y-m-d H:i:s", $strto_date);

        $appoint_time = array("10:00", "10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30"
        ,"17:00","17:30","18:00","18:30","19:00","19:30");

        $designers = Shift::where('date', $date)->get();
        // 선택한 예약 시간과 일치하는 데이터베이스의 필드 
        $appoints = Appoint::where('appoint_st','like',$datetime)->orwhere('appoint_end','like',$strto_date)->orderBy('appoint_st','asc')->get();
        $ap_designer[0] = "test";
        $idx = 0;
        foreach($appoints as $appoint){
            // 해당 시간에 예약이 잡혀있는 디자이너
            $ap_designer[$idx] = $appoint->designer;
            $idx++;
        }
        $ds_appoints = Appoint::where([['designer','like',$designer],['appoint_st','like', $date.'%'],])->orderBy('appoint_st','asc')->get();
        return view('appoint.create', [
            'designers'=>$designers,
            'appoints'=>$appoints,
            'ds_appoints'=>$ds_appoints,
            'date'=>$date,
            'datetime'=>$datetime,
            'designer'=>$designer,
            'time'=>$time,
            'appoint_time'=>$appoint_time,
            'ap_designer'=>$ap_designer
        ]);
    }

    public function designer(Request $request) //디자니어페이지 메소드
    {
        date_default_timezone_set('Asia/Seoul');
        // $year, $month 값이 없으면 현재 날짜
        $year = $_GET['year'];
        $month = $_GET['month'];
        $day = $_GET['day'];
        if($month < 10){
            $dt_month = '0'.$month;
        }else{
            $dt_month = $month;
        }
        if($day < 10) {
            $dt_day = '0'.$day;
        }else{
            $dt_day = $day;
        }
        $date = $year.'-'.$dt_month.'-'.$dt_day;
        $staff_count = 0;
        $appoint_time = array("10:00", "10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30"
        ,"17:00","17:30","18:00","18:30","19:00","19:30");

        $designer_info = array('staff_1'=>'불속성', 'staff_2'=>'풀속성', 'staff_3'=>'물속성', 'staff_4'=>'빛속성' ,'staff_5'=>'전기속성', 'staff_6'=>'바위속성');

        $designers = Shift::where('date', $date)->get();
        $appoints = Appoint::where('appoint_st','like', $date.'%')->orderBy('appoint_st','asc')->get();

        return view('appoint.designer', [
            'designers'=>$designers,
            'appoints'=>$appoints,
            'designer_info'=>$designer_info,
            'year'=>$year,
            'month'=>$month,
            'day'=>$day,
            'date'=>$date,
            'staff_count'=>$staff_count,
            'appoint_time'=>$appoint_time
        ]);
    }

    public function store(Request $request) //저장 메소드
    {
        $date = $request->input('date'); // 날짜
        $time =  $request->input('time');
        $designer = $request->input('designer'); // 디자이너
        $mem_id = $request->input('mem_id');
        $mem_email = $request->input('email');
        $hair_style = $request->input('hair_style');
        $appoint_st = $date." ".$time; 
        if($hair_style == 'Cut'){
            // strtotime('시간변수', '+30 minutes') : 기존의 시각에 30분을 더함
            $appoint_end = strtotime($appoint_st.'+30 minutes');
        } else {
            $appoint_end = strtotime($appoint_st.'+1 hours');
        }
        // date("Y-m-d h:i:s", $strto_appoint_end[$l]); : 변수를 date Y-m-d h:i:s 형식으로 변경
        $appoint_end = date("Y-m-d H:i:s", $appoint_end);

        Appoint::get();
        $Appoint = new Appoint;
        $Appoint->mem_id = $mem_id;
        $Appoint->mem_email  = $mem_email;
        $Appoint->designer = $designer; 
        $Appoint->hair_style = $hair_style; 
        $Appoint->appoint_st = $appoint_st;
        $Appoint->appoint_end = $appoint_end;
        $Appoint->save();

        Alert::success('예약완료', '예약이 완료 되었습니다.');

        return redirect("/");
    }

        // use Illuminate\Http\Request 클래스의 변수
        public function appo_calender(Request $request) // Request 클래스의 변수 매개변수로 사용
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
            return view('manager.appo_calender', [
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

        public function management(Request $request) //매니저 페이지 메소드
        {
            date_default_timezone_set('Asia/Seoul');
            // $date 값이 없으면 현재 날짜
            $date = date("Y-m-d");
    
            $appoints = Appoint::where('appoint_st','like', $date.'%')->orderBy('appoint_st','asc')->get();

            return view('manager.index', [
                'appoints'=>$appoints,
                'date'=>$date
            ]);
        }

        public function management_delete(Request $request) //매니저 페이지 메소드
        {
            // $date 값이 없으면 현재 날짜
            $date = $request->input('date');
    
            $appoints = Appoint::where('appoint_st','like', $date.'%')->orderBy('appoint_st','asc')->get();
            
            if($request->input('all') != NULL){
                // 삭제요청
                Appoint::where('appoint_st','like', $date.'%')->delete();
            } else if($request->input('checked') != NULL) {
                $checked = $request->input('checked');
                foreach($checked as $check){
                    Appoint::where('No', $check)->delete();
                }
            } else {
                Appoint::where('No', $request->input('delNo'))->delete();
            }
    
            // 삭제요청
            Alert::error('예약취소', '예약이 취소 되었습니다.');
    
            return redirect('/manager');
        }

        public function appo_management(Request $request) //디자니어페이지 메소드
        {
            // $date 값이 없으면 현재 날짜
            $date = $_GET['date'];
    
            $designers = Shift::where('date', $date)->get();
            $appoints = Appoint::where('appoint_st','like', $date.'%')->orderBy('appoint_st','asc')->get();

            return view('manager.appo_management', [
                'designers'=>$designers,
                'appoints'=>$appoints,
                'date'=>$date
            ]);
        }

        public function appo_delete(Request $request) //저장 메소드
        {
            // $date 값이 없으면 현재 날짜
            $date = $request->input('date');
    
            $designers = Shift::where('date', $date)->get();
            $appoints = Appoint::where('appoint_st','like', $date.'%')->orderBy('appoint_st','asc')->get();
            
            if($request->input('all') != NULL){
                // 삭제요청
                Appoint::where('appoint_st','like', $date.'%')->delete();
            } else if($request->input('checked') != NULL) {
                $checked = $request->input('checked');
                foreach($checked as $check){
                    Appoint::where('No', $check)->delete();
                }
            } else {
                Appoint::where('No', $request->input('delNo'))->delete();
            }
    
            // 삭제요청
            Alert::error('예약취소', '예약이 취소 되었습니다.');
    
            return redirect('/manager/appo_management?date='.$date.'');
        }
      
        public function mypage(Request $request) //마이페이지 메소드
        {
            // 임시 아이디
            $mem_id = '이경민'; 
            $date = date("Y-m-d H:i:s");

            $appoints = Appoint::where('mem_id','like', $mem_id)->get();
            $dt_appoints = Appoint::where([['mem_id','like', $mem_id],['appoint_st','>=', $date],])->get();
    
            return view('mypage.index', [
                'appoints' => $appoints,
                'dt_appoints' => $dt_appoints
            ]);
        }

        public function mypage_delete(Request $request) //마이페이지 메소드
        {
            // 임시 아이디
            $mem_id = '이경민'; 
            
            if($request->input('all') != NULL){
                // 삭제요청
                Appoint::where('mem_id','like', $mem_id)->delete();
            } else if($request->input('checked') != NULL) {
                $checked = $request->input('checked');
                foreach($checked as $check){
                    Appoint::where('No', $check)->delete();
                }
            } else {
                Appoint::where('No', $request->input('delNo'))->delete();
            }
    
            // 삭제요청
            Alert::error('예약취소', '예약이 취소 되었습니다.');
    
            return redirect('/mypage');
        }
}
