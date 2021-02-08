<?php use App\Shift; // 변형하는 day에 맞춰 blade 내부에서의 테이블명 지정 ?>
@extends('layouts.appoint_layout')
{{-- 레이아웃을 사용함. --}}
{{-- blade파일에서 @section('yield 이름') 으로 yield 부분에 넣을 컨텐츠를 작성할 수 있고 @endsection으로 닫아줘야한다. --}}
@section('title')
Shift Calendar
@endsection

@section('style')
<link rel="stylesheet" href="/css/appoint.css">
@endsection
@section('content')
<div class="container">
    <table class="table table-bordered table-responsive">
        <tr align="center">
            <td>
                @if ($prevyear > 2020)
                <a href="/manager/shift_calender?year={{$prevyear}}&month={{$month}}&day=1">◀◀</a>
                @else
                ◀◀
                @endif
            </td>
            <td>
                @if ($prev_year > 2020)
                <a href="/manager/shift_calender?year={{$prev_year}}&month={{$prev_month}}&day=1">◀</a>
                @else
                ◀
                @endif
            </td>
            <td height=" 50" bgcolor="#FFFFFF" colspan="3">
                <a href="/manager/shift_calender?year={{$thisyear}}&month={{$thismonth}}&day=1">
                    &nbsp;&nbsp;{{$year}}年 {{$month}}月&nbsp;&nbsp;</a>
            </td>
            <td>
                <a href="/manager/shift_calender?year={{$next_year}}&month={{$next_month}}&day=1">▶</a>
            </td>
            <td>
                <a href="/manager/shift_calender?year={{$nextyear}}&month={{$month}}&day=1">▶▶</a>
            </td>
        </tr>
        <tr class="info">
            <th height="30">日</td>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
        </tr>

        <?php
            // 5. 화면에 표시할 화면의 초기값을 1로 설정
            $day=1;
        
            // 6. 총 주 수에 맞춰서 세로줄 만들기
        for($i=1; $i <= $total_week; $i++){?>
        <tr>
            <?php
            // 7. 총 가로칸 만들기
            for ($j = 0; $j < 7; $j++) {
                // 8. 첫번째 주이고 시작요일보다 $j가 작거나 마지막주이고 $j가 마지막 요일보다 크면 표시하지 않음
                echo '<td width="50" height="150" valign="top">';
                if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))) {
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
                    $designers = Shift::where('date', $date)->get();
                    $ds_staff[0] = 'test';
                    foreach($designers as $designer){
                        for($k=0; $k<6; $k++){
                            $staff = 'staff_'.($k+1);
                            $ds_staff[$k] = $designer->$staff;
                        }
                    }
                    if ($j == 0 || $j == 3 && $day > 14 && $day < 23) {
                        // 9. $j가 0이면 일요일이므로 빨간색
                        $style = "red";
                    } else if ($j == 6) {
                        // 10. $j가 0이면 토요일이므로 파란색
                        $style = "blue";
                    } else {
                        // 11. 그외는 평일이므로 검정색
                        $style = "black";
                    }
        
                    // 12. 오늘 날짜면 굵은 글씨
                    if ($year == $thisyear && $month == $thismonth && $day == date("j") && $style != "red") {
                        // 13. 날짜 출력
                        echo '<font class='.$style.'>';
                        if($ds_staff[0] != 'test') {
                            echo '<a style = "color:'.$style.'" href="/manager/shift_management?date='.$date.'">'.$day;
                            for($k=0; $k<6; $k++){
                                if($ds_staff[$k] == 'on'){
                                    echo '<div class="staff_'.($k+1).'" style="font-size: 9pt">staff_'.($k+1).'</div>';
                                }
                            }
                            echo '</a>';
                        } else {
                            echo '<a style = "color:'.$style.'" href="/manager/shift_management?date='.$date.'">'.$day.'<div style="font-size: 9pt">職員なし</div></a>';
                        }                  
                        echo '</font>';
                    } else {
                        echo '<font class='.$style.'>';
                        if($year == $thisyear){
                            if($month==$thismonth && $day >= $today && $style != "red" 
                            || $month==$thismonth+1 && $day <= $today && $style != "red"){
                                if($ds_staff[0] != 'test') {
                                    echo '<a style = "color:'.$style.'" href="/manager/shift_management?date='.$date.'">'.$day;
                                    for($k=0; $k<6; $k++){
                                        if($ds_staff[$k] == 'on'){
                                            echo '<div class="staff_'.($k+1).'" style="font-size: 9pt">staff_'.($k+1).'</div>';
                                        }
                                     }
                                    echo '</a>';
                                } else {
                                    echo '<a style = "color:'.$style.'" href="/manager/shift_management?date='.$date.'">'.$day.'<div style="font-size: 9pt">職員なし</div></a>';
                                }
                            } else {
                                echo $day;
                                if($style == "red"){
                                    echo '<div style="font-size: 9pt">休日</div>';
                                }
                            }
                        } else if($year == ($thisyear+1) && $thismonth == 12 && $month == 1 && $day <= $today && $style != "red"){
                            if($ds_staff[0] != 'test') {
                                echo '<a style = "color:'.$style.'" href="/manager/shift_management?date='.$date.'">'.$day;
                                for($k=0; $k<6; $k++){
                                    if($ds_staff[$k] == 'on'){
                                        echo '<div class="staff_'.($k+1).'" style="font-size: 9pt">staff_'.($k+1).'</div>';
                                     }
                                }
                                echo '</a>';
                            } else {
                                echo '<a style = "color:'.$style.'" href="/manager/shift_management?year=date='.$date.'">'.$day.'<div style="font-size: 9pt">職員なし</div></a>';
                            }
                        } else {
                            echo $day;
                            if($style == "red"){
                                    echo '<div style="font-size: 9pt">休日</div>';
                                }
                        }
                        echo '</font>';
                    }
                    // 14. 날짜 증가
                    $day++;
                }
                echo '</td>';
            }
         ?>
        </tr>
        <?php } ?>
    </table>
</div>
@endsection