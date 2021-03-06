@extends('layouts.appoint_layout')
{{-- 레이아웃을 사용함. --}}
{{-- blade파일에서 @section('yield 이름') 으로 yield 부분에 넣을 컨텐츠를 작성할 수 있고 @endsection으로 닫아줘야한다. --}}
@section('title')
Appoint Calendar
@endsection

@section('style')
<link rel="stylesheet" href="/css/appoint.css">
@endsection
@section('content')
<nav class="border-b border-gray-400">
    <div class="container flex flex-col md:flex-row items-center justify-between py-6">
        <ul class="flex flex-col md:flex-row items-cneter">
            <li class="md:ml-16 mt-3 md:mt-0">
                <a href="/" class="hover:text-gray-300 text-white font-bold text-4xl">KD-harisop</a>
            </li>
        </ul>
        <ul class="flex flex-col md:flex-row items-cneter">
            @if(session('member_id'))
            <li class="md:ml-16 mt-3 md:mt-0">
                <a href="/login/logout" class="text-white hover:text-gray-300 font-bold">ログアウト</a>
            </li>
            @if(session('rank'))
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="/manager" class="text-white hover:text-gray-300 font-bold">マネージャーページ</a>
            </li>
            @else
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="/mypage" class="text-white hover:text-gray-300 font-bold">マイページ</a>
            </li>
            @endif
            @else
            <li class="md:ml-16 mt-3 md:mt-0">
                <a href="/login/login" class="text-white hover:text-gray-300 font-bold">ログイン</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="/login/register" class="text-white hover:text-gray-300 font-bold">会員登録</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
<br>
<div class="container bg-white pt-6">
    <table class="table table-bordered table-responsive">
        <tr style="color: black" align="center">
            <td>
                @if ($prevyear > 2020)
                <a href="/appoint?year={{$prevyear}}&month={{$month}}&day=1">◀◀</a>
                @else
                ◀◀
                @endif
            </td>
            <td>
                @if ($prev_year > 2020)
                <a href="/appoint?year={{$prev_year}}&month={{$prev_month}}&day=1">◀</a>
                @else
                ◀
                @endif
            </td>
            <td height=" 50" bgcolor="#FFFFFF" colspan="3">
                <a style="font-weight: bold; font-size:1.5em; color:black" href="/appoint?year={{$thisyear}}&month={{$thismonth}}&day=1">
                    &nbsp;&nbsp;{{$year}}年 {{$month}}月&nbsp;&nbsp;</a>
            </td>
            <td>
                <a href="/appoint?year={{$next_year}}&month={{$next_month}}&day=1">▶</a>
            </td>
            <td>
                <a href="/appoint?year={{$nextyear}}&month={{$month}}&day=1">▶▶</a>
            </td>
        </tr>
        <tr class="info">
            <th hight="30">日</td>
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
                echo '<td width = "50" height="50" valign="top">';
                if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))) {
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
                        echo '<a style = "color:'.$style.'" href="/appoint/designer?year='.$year.'&month='.$month.'&day='.$day.'">'.$day.'<div style="font-size: 9pt">予約可能</div></a>';
                        echo '</font>';
                    } else {
                        echo '<font class='.$style.'>';
                        if($year == $thisyear){
                            if($month==$thismonth && $day >= $today && $style != "red" 
                            || $month==$thismonth+1 && $day <= $today && $style != "red"){
                                echo '<a style = "color:'.$style.'" href="/appoint/designer?year='.$year.'&month='.$month.'&day='.$day.'">'.$day.'<div style="font-size: 9pt">予約可能</div></a>';
                            } else {
                                echo $day;
                                if($style == "red"){
                                    echo '<div style="font-size: 9pt">休日</div>';
                                }
                            }
                        } else if($year == ($thisyear+1) && $thismonth == 12 && $month == 1 && $day <= $today && $style != "red"){
                            echo '<a style = "color:'.$style.'" href="/appoint/designer?year='.$year.'&month='.$month.'&day='.$day.'">'.$day.'<div style="font-size: 9pt">予約可能</div></a>';
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