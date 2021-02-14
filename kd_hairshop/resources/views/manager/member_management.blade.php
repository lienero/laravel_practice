@extends('layouts.main')
@section('content')
@if(session('rank'))
<form action="/manager/member_management" method="POST">
{{-- @csrf : CSRF(크로스-사이트 요청 위조 공격)으로부터 보호 --}}
@csrf
<div class="container mx-auto mt-5">
    <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-lg">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox check-all" name="all">
                            <span class="ml-2">Check-All</span>
                        </label>
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Mail-Address</th>
                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b-2 border-gray-300 text-sm leading-5">
                        <button type="submit" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none font-semibold">全体脱退</button>
                    </td>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($members as $member)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm leading-5 text-gray-800">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="form-checkbox ab" name="checked[]" value="{{$member->mem_id}}">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <div class="text-sm leading-5 text-blue-900">{{$member->mem_id}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                        {{$member->mem_email}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                        <input type="hidden" name="delMem" value="{{$member->mem_id}}">
                        <button type="submit" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none font-semibold">脱退</button>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5 text-left">
                        <a href="/manager/member_management?page={{ $startPage }}">◀◀</a>
                      <span class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 text-sm leading-5">
                        <?php 
                        if($pageNum == 1) {
                          echo "◀</span>";
                        } else { 
                          echo '<a href="/manager/member_management?page='.($pageNum-1).'">◀</a></span>';
                        } 
                        if($pageNum == $totalPage) { 
                          echo '<span class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 text-sm leading-5">▶</span>';
                        } else { 
                          echo '<span class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"><a href ="/manager/member_management?page='.($pageNum+1).'">▶</a></span>';
                        } ?> 
                        <a href = "/manager/member_management?page={{ $endPage }}">▶▶</a>
                    </td>
                  </tr>
            </tbody>
        </table>
    </div>
</div>
</form>
@else
관리자 권한 없음
@endif
@endsection