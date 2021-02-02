@extends('layouts.main')
@extends('layouts.sliderbox')
@extends('layouts.footer')
@section('content')
<br>
<div>디자이너 선택</div>
@foreach($disigners as $disigner)
<div>
    <br>
</div>
<?php 
for($i=1; $i<7; $i++) {
    $staff = 'staff_'.$i; 
    if($disigner->$staff != NULL) {
       echo '<div> <a href="/appoint/create?date='.$date.'&designer='.$staff.'">'.$staff.'</a></div>';
    }
}
?>
@endforeach
<br>
<div>시간선택</div>
<br>
<?php
$j = 0;
foreach($appoints as $appoint){
    $appoint_st[$j] = $appoint->appoint_st;
    $appoint_end[$j] = $appoint->appoint_end;
    $j++;
}
for($k=0; $k < count($appoint_time); $k++){
    $count = 0;
    for($l=0; $l<$j; $l++){
        list($st_date, $st_time) = explode(" ",$appoint_st[$l]);
        list($end_date, $end_time) = explode(" ",$appoint_end[$l]);
        if($count == 0) {
            if($appoint_time[$k].':00' < $st_time || $appoint_time[$k].':00' >= $end_time){
                
                echo '&nbsp;&nbsp;<a href="/appoint/create?date='.$date.'&time='.$appoint_time[$k].':00">'.$appoint_time[$k].'</a>';
                $count=1;
            } 
        }
    }
    if(($k%5) == 0 && $k != 0) {
        echo '<br>';
    }
}
?>
@endsection