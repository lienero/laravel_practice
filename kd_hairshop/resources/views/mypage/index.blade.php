@extends('layouts.main')
@extends('layouts.footer')
@section('content')
<form action="/manager/appo_management" method="POST">
    {{-- @csrf : CSRF(크로스-사이트 요청 위조 공격)으로부터 보호 --}}
    @csrf
    <div class="container mx-auto mt-5">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-lg">
        </div>
    </div>
</form>
@endsection