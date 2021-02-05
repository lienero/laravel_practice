@extends('layouts.main')
@section('content')

<form action="/appoint" method="POST">
@csrf
<div class="w-full bg-cover bg-center" style="height:32rem; background-image:url(/img/hair1.jpg)">
    <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-50">
        <div class="text-center">
            <h1 class="text-white text-2xl font-semibold uppercase md:text-3xl">KD-hairshop <span class="underline text-white">非会員予約</span></h1>
        </div>
    </div>
</div>
<br>
<div class="container mx-auto">
            <div class="appearance-none label-floating">
                <input type="hidden" id = "date" name = "date" value="{{$date}}">
                <input class="mx-auto tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block  w-sp bg-gray-200 border border-gray-200 rounded-lg focus:outline-none focus:bg-white focus:border-gray-500 focus:text-black"
                id="name" name="mem_id" type="text" placeholder="予約者名" required style="color :black; font-weight:bold;">
                <label for="name" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text text-black" >
                </label>
            </div>
            <div class="appearance-none label-floating">
                <input class="mx-auto tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-sp bg-gray-200 border border-gray-200 rounded-lg focus:outline-none focus:bg-white focus:border-gray-500 focus:text-black"
                id="name" name="email" type="text" placeholder="メールアドレス" required style="color :black; font-weight:bold;">
                <label for="name" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                </label>
            </div>
</div>
<div class="container mx-auto">
        <div class="" mbsc-form style="">
            <div class="mbsc-grid mbsc-form-grid">
                    <div class="mx-auto mbsc-col-sm-12 mbsc-col-md-6">
                    @if($designer == 'x')
                    <label>
                            職員選び
                            <select mbsc-dropdown id="demo-desktop" data-input-style="box" name="designer">
                            <?php
                            foreach ($designers as $designer) {
                                for($j = 1; $j < 7; $j++ ){
                                    $count = 0;
                                    $staff = 'staff_'.$j;
                                    if($designer->$staff != NULL){
                                        for($k = 0; $k < count($ap_designer); $k++){
                                            if($staff == $ap_designer[$k]){
                                                $count = 1;
                                            }
                                        }
                                        if($count == 0){
                                            echo '<option value="'.$staff.'">'.$staff.$designer[0].'</option>';
                                        }
                                    }
                                }     
                            }    
                            ?>
                            </select>
                        </label>
                        <label>
                            職員選び
                            <select mbsc-dropdown id="demo-desktop" data-input-style="box" name="designer">
                                <option id = "time" name = "time" value="{{$time}}">{{$datetime}}</option>
                            </select>
                        </label>
                    @else
                        <label>
                            時間選び
                            <select mbsc-dropdown id="demo-mobile" data-input-style="box" name="time">
                            <?php
                            $j = 0;
                            $page_count = 0;
                            foreach($ds_appoints as $ds_appoint){
                                // 변수 배열에 예약 시작 시간과 예약 종료 시간을 지정한다. 
                                $appoint_st[$j] = $ds_appoint->appoint_st;
                                $appoint_end[$j] = $ds_appoint->appoint_end;
                                // $j 변수에 오늘 예약된 시각의 수를 지정한다. 
                                $j++;
                            }
                            for($k=0; $k < count($appoint_time); $k++){
                                // 출력 제한을 위한 카운트 변수 선언
                                $ds_count = 0;
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
                                        // 카운트가 0이거나 디자이너 시간과 관련된 변수의 카운트가 스태프의 수보다 작으면 작동 
                                        if($ds_count == 0 && $st_count == 0 && $end_count == 0) {
                                            // 시작시간보다 배열의 시간이 작거나 끝나는 시간보다 클 경우에 작동
                                            if($appoint_time[$k].':00' < $st_time || $appoint_time[$k].':00' >= $end_time){
                                                echo '<option value="'.$appoint_time[$k].':00">'.$appoint_time[$k].'</option>';
                                                // 출력을 할 시 반복을 끝내는 위해 count를 0에서 벗어나게 한다. 
                                                $ds_count=1;
                                            }
                                        }
                                    }
                                } else {
                                    // 카운트가 0이거나 디자이너 시간과 관련된 변수의 카운트가 스태프의 수보다 작으면 작동 
                                    if($ds_count == 0 && $st_count == 0 && $end_count == 0) {
                                        // 시작시간보다 배열의 시간이 작거나 끝나는 시간보다 클 경우에 작동
                                        echo '<option value="'.$appoint_time[$k].':00">'.$appoint_time[$k].'</option>';
                                            // 출력을 할 시 반복을 끝내는 위해 count를 0에서 벗어나게 한다. 
                                            $ds_count=1;
                                    }
                                }
                            }
                            ?>
                            </select>
                        </label>
                        @endif 
                        <label>
                            ヘアスタイル選び
                            <select mbsc-dropdown id="demo-desktop" data-input-style="box" name="hair_style">
                                <option value="Cut">カット: 5,000 円（30 分）</option>
                                <option value="Perm">パーマ：6,000 円（1 時間）</option>
                                <option value="Color">カラー：4,000 円 (1 時間）</option>
                            </select>
                        </label>      
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="flex justify-center">
    <input type="submit" value="予約" class="bg-gray-900 rounded-lg font-bold text-lg text-white text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-gray-200 hover:text-gray-900 mr-6"/>
</div>
</form>
@endsection