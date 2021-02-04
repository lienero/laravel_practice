@extends('layouts.main')
@extends('layouts.footer')
@section('content')
<br>
<style>
    .bannerFondo{
            height: 400px;
    }
    </style>
    <div class="">      
        <div class="bannerFondo bg-gray-600 bg-left-top bg-auto bg-repeat-x" style="background-image: url(./img/continuartl_4.png)">
        </div>
    
          <div class="-mt-64 ">
            <div class="w-full text-center">
              <p class="text-xl font-bold tracking-widest text-white">KD-hair</p>
              <h1 class="font-bold text-5xl text-white">
                    職員選び
              </h1>
          </div>
          @foreach($designers as $designer)
        <div>
            <br>
        </div>
        <?php 
        $staff_count = 0;
        for($i=1; $i<7; $i++) {
            // 데이터베이스의 스태프의 이름을 변수로 지정한다.      
            $staff = 'staff_'.$i; 
            // 다자이너 테이블의 staff변수(staff_?) 가 null 이 아니면 출력
            if($designer->$staff != NULL) {
                // 링크에 겟 형식으로 변수를 보내준다.
                if(($staff_count % 3) == 0 && $staff_count >= 3) {
                    echo '</div>';
                } 
                if(($staff_count % 3) == 0 && $staff_count < 6) {
                    echo '        
                    <div class="container mx-auto grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <div class="p-2 sm:p-10 text-center cursor-pointer mx-auto">
                        <div class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-white transition duration-500 bg-white hover:bg-gray-400">
                            <div class="space-y-10">
                                <img src="/img/cut1.jpg" alt="">
                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2 text-gray-800"><a href="/appoint/create?date='.$date.'&designer='.$staff.'">'.$staff.'</a></div>
                                        <p class="text-gray-700 text-base">
                                            '.$designer_info[$staff].'
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                } else {
                    echo '
                    <div class="p-2 sm:p-10 text-center cursor-pointer mx-auto">
                        <div class="py-16 max-w-sm rounded overflow-hidden shadow-lg hover:bg-white transition duration-500 bg-white hover:bg-gray-400">
                            <div class="space-y-10">
                                <img src="/img/cut1.jpg" alt="">
                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2 text-gray-800"><a href="/appoint/create?date='.$date.'&designer='.$staff.'">'.$staff.'</a></div>
                                        <p class="text-gray-700 text-base">
                                            '.$designer_info[$staff].'
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                // 스태프의 수를 지정하는 변수 
                $staff_count++;
            }
        }
        ?>
        @endforeach    
        </>
          </div>
      
      </div>
    </div> 
    <div class="">      
        <div class="bannerFondo bg-gray-600 bg-left-top bg-auto bg-repeat-x" style="background-image: url(./img/continuartl_4.png)">
        </div>
    
          <div class="-mt-64 ">
            <div class="w-full text-center">
              <p class="text-xl font-bold tracking-widest text-white">KD-hair</p>
              <h1 class="font-bold text-5xl text-white">
                    時間選び
              </h1>
          </div>
        </div>
        <div class="container mx-auto">
            <table class="w-full border-2">
                <tbody class="divide-y bg-gray-700">
                    <?php
                        $j = 0;
                        $page_count = 0;
                        foreach($appoints as $appoint){
                            // 변수 배열에 예약 시작 시간과 예약 종료 시간을 지정한다. 
                            $appoint_st[$j] = $appoint->appoint_st;
                            $appoint_end[$j] = $appoint->appoint_end;
                            // $j 변수에 오늘 예약된 시각의 수를 지정한다. 
                            $j++;
                        }
                        for($k=0; $k < count($appoint_time); $k++){
                            // 출력 제한을 위한 카운트 변수 선언
                            $count = 0;
                            // 디자이너 전원의 예약이 차있는지 확인하는 변수
                            $st_count = 0;
                            $end_count = 0;
                            for($l=0; $l<$j; $l++){
                                // explode(공백을 기준으로 date 와 time으로 나눈다)
                                list($st_date, $st_time) = explode(" ",$appoint_st[$l]);
                                // strtotime('시간변수', '-30 minutes') : 기존의 시각에 30분을 뺌
                                $strto_appoint_end[$l] = strtotime($appoint_end[$l].'-30 minutes');
                                // date("Y-m-d h:i:s", $strto_appoint_end[$l]); : 변수를 date Y-m-d h:i:s 형식으로 변경
                                $strto_appoint_end[$l] = date("Y-m-d h:i:s", $strto_appoint_end[$l]);
                                list($end_date, $end_time) = explode(" ", $strto_appoint_end[$l]);
                                // 예약된 시작 시간과 배열에 등록된 시간이 같으면 카운트 추가
                                // 데이터베이스와 형식을 맞추기 위해 ':00' 를 합친다.
                                if($st_time == $appoint_time[$k].':00'){
                                    $st_count++;
                                }
                                // 예약된 시작 시간이나 끝나는 시간이 같으면 배열에 등록된 시간이 같으면 카운트 추가
                                if($end_time == $appoint_time[$k].':00' || $st_time == $appoint_time[$k].':00'){
                                    $end_count++;
                                }
                            }
                            if($j != 0){
                                for($l=0; $l<$j; $l++){
                                    // explode(공백을 기준으로 date 와 time으로 나눈다)
                                    list($st_date, $st_time) = explode(" ",$appoint_st[$l]);
                                    list($end_date, $end_time) = explode(" ",$appoint_end[$l]);
                                    if(($page_count%3) == 0) {
                                        echo '<tr class="">';
                                    }
                                    // 카운트가 0이거나 디자이너 시간과 관련된 변수의 카운트가 스태프의 수보다 작으면 작동 
                                    if($count == 0 && $st_count < $staff_count && $end_count < $staff_count) {
                                        // 시작시간보다 배열의 시간이 작거나 끝나는 시간보다 클 경우에 작동
                                        if($appoint_time[$k].':00' < $st_time || $appoint_time[$k].':00' >= $end_time){
                                            echo '<td class="px-6 py-4 text-center border-2 hover:bg-white hover:text-black font-bold hover:border-4 "><a href="/appoint/create?date='.$date.'&time='.$appoint_time[$k].':00">'.$appoint_time[$k].'</a></td>';
                                            // 출력을 할 시 반복을 끝내는 위해 count를 0에서 벗어나게 한다. 
                                            $count=1;
                                            $page_count++;
                                        }
                                    }
                                    if(($page_count%3) == 0) {
                                        echo '</tr>';
                                    }     
                                }
                            } else {
                                if(($page_count%3) == 0) {
                                    echo '<tr class="">';
                                }
                                // 카운트가 0이거나 디자이너 시간과 관련된 변수의 카운트가 스태프의 수보다 작으면 작동 
                                if($count == 0 && $st_count < $staff_count && $end_count < $staff_count) {
                                    // 시작시간보다 배열의 시간이 작거나 끝나는 시간보다 클 경우에 작동
                                        echo '<td class="px-6 py-4 text-center border-2 hover:bg-white hover:text-black font-bold hover:border-4 "><a href="/appoint/create?date='.$date.'&time='.$appoint_time[$k].':00">'.$appoint_time[$k].'</a></td>';
                                        // 출력을 할 시 반복을 끝내는 위해 count를 0에서 벗어나게 한다. 
                                        $count=1;
                                        $page_count++;
                                }
                                if(($page_count%3) == 0) {
                                    echo '</tr>';
                                }   
                            }
                        }
                        ?>
                </tbody> 
            </table>       
        </div>
    </div>    

<?php
$j = 0;
$page_count = 0;
foreach($appoints as $appoint){
    // 변수 배열에 예약 시작 시간과 예약 종료 시간을 지정한다. 
    $appoint_st[$j] = $appoint->appoint_st;
    $appoint_end[$j] = $appoint->appoint_end;
    // $j 변수에 오늘 예약된 시각의 수를 지정한다. 
    $j++;
}
for($k=0; $k < count($appoint_time); $k++){
    // 출력 제한을 위한 카운트 변수 선언
    $count = 0;
    // 디자이너 전원의 예약이 차있는지 확인하는 변수
    $st_count = 0;
    $end_count = 0;
    for($l=0; $l<$j; $l++){
        // explode(공백을 기준으로 date 와 time으로 나눈다)
        list($st_date, $st_time) = explode(" ",$appoint_st[$l]);
        // strtotime('시간변수', '-30 minutes') : 기존의 시각에 30분을 뺌
        $strto_appoint_end[$l] = strtotime($appoint_end[$l].'-30 minutes');
        // date("Y-m-d h:i:s", $strto_appoint_end[$l]); : 변수를 date Y-m-d h:i:s 형식으로 변경
        $strto_appoint_end[$l] = date("Y-m-d h:i:s", $strto_appoint_end[$l]);
        list($end_date, $end_time) = explode(" ", $strto_appoint_end[$l]);
        // 예약된 시작 시간과 배열에 등록된 시간이 같으면 카운트 추가
        // 데이터베이스와 형식을 맞추기 위해 ':00' 를 합친다.
        if($st_time == $appoint_time[$k].':00'){
            $st_count++;
        }
        // 예약된 시작 시간이나 끝나는 시간이 같으면 배열에 등록된 시간이 같으면 카운트 추가
        if($end_time == $appoint_time[$k].':00' || $st_time == $appoint_time[$k].':00'){
            $end_count++;
        }
    }
    for($l=0; $l<$j; $l++){
        // explode(공백을 기준으로 date 와 time으로 나눈다)
        list($st_date, $st_time) = explode(" ",$appoint_st[$l]);
        list($end_date, $end_time) = explode(" ",$appoint_end[$l]);
        // 카운트가 0이거나 디자이너 시간과 관련된 변수의 카운트가 스태프의 수보다 작으면 작동 
        if($count == 0 && $st_count < $staff_count && $end_count < $staff_count) {
            // 시작시간보다 배열의 시간이 작거나 끝나는 시간보다 클 경우에 작동
            if($appoint_time[$k].':00' < $st_time || $appoint_time[$k].':00' >= $end_time){
                echo '&nbsp;&nbsp;<a href="/appoint/create?date='.$date.'&time='.$appoint_time[$k].':00">'.$appoint_time[$k].'</a>';
                // 출력을 할 시 반복을 끝내는 위해 count를 0에서 벗어나게 한다. 
                $count=1;
                $page_count++;
            }
        }
    }
    // 5개로 나누었을 때 0이면 다음으로 넘어간다.
    if(($page_count%5) == 0 && $page_count != 0) {
        echo '<br>';
    }
}
?>
@endsection