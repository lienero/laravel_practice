@section('nav_bar_manager')
<div class="container mx-auto">
    <div class="grid grid-cols-3">
      <a href="/manager/appo_calender" class="">
        <div class="bg-gray-800 text-center text-2xl hover:bg-gray-200 hover:text-black font-bold">予約管理</div>
      </a>
      <a href="/manager/shift_calender">
        <div class="bg-gray-600 text-center text-2xl hover:bg-gray-200 hover:text-black font-bold">シフト管理</div>
      </a>
      <a href="/manager/member_management" class="">
        <div class="bg-gray-800 text-center text-2xl hover:bg-gray-200 hover:text-black font-bold">会員管理</div>
      </a>
    </div>
</div>
@endsection