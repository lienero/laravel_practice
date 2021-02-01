@extends('layouts.main')
@extends('layouts.sliderbox')
@extends('layouts.footer')
@section('content')
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
@endsection