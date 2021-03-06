@extends('layouts.main')
@extends('layouts.footer')
@section('content')
<form action="/mypage" method="POST">
    {{-- @csrf : CSRF(크로스-사이트 요청 위조 공격)으로부터 보호 --}}
    @csrf
    <div class="container mx-auto mt-5">
        <br>
        <div class="w-full text-left">
            <p class="text-xl font-bold tracking-widest text-white">会員情報</p>
        </div>
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            Mail-Address</th>
                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b-2 border-gray-300 text-sm leading-5">
                        </td>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{session('member_id')}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{session('email')}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                            <button type="button" onclick="location.href='/mypage/delete_member'" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">会員退会</button>
                        </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br><br>
        <div class="w-full text-left">
            <p class="text-xl font-bold tracking-widest text-white">会員予約管理</p>
        </div>
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
                            DateTime</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            Mail-Address</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            hair-Cut</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            Designer</th>
                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b-2 border-gray-300 text-sm leading-5">
                            <button type="submit" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">All-Cancel</button>
                        </td>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($dt_appoints as $dt_appoint)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm leading-5 text-gray-800">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox ab" name="checked[]" value="{{$dt_appoint->No}}">
                                        </label></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{$dt_appoint->appoint_st}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{$dt_appoint->mem_id}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{$dt_appoint->mem_email}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{$dt_appoint->hair_style}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5">
                            {{$designer_name[$dt_appoint->designer]}}
                        </td>
                        <input type="hidden" name="delNo" value="{{$dt_appoint->No}}">
                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                            <button type="submit" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Cancel</button>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5 text-left">
                            <a href="/mypage?dt_page={{ $dt_startPage }}">◀◀</a>
                          <span class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 text-sm leading-5">
                            <?php 
                            if($dt_pageNum == 1) {
                              echo "◀</span>";
                            } else { 
                              echo '<a href="/mypage?dt_page='.($dt_pageNum-1).'">◀</a></span>';
                            } 
                            if($dt_pageNum == $dt_totalPage) { 
                              echo '<span class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 text-sm leading-5">▶</span>';
                            } else { 
                              echo '<span class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"><a href ="/mypage?dt_page='.($dt_pageNum+1).'">▶</a></span>';
                            } ?>   
                            <a href = "/mypage?dt_page={{ $dt_endPage }}">▶▶</a>
                        </td>
                      </tr>
                </tbody>
            </table>
            </div>
            <br><br><br>
            <div class="w-full text-left">
                <p class="text-xl font-bold tracking-widest text-white">会員利用内訳</p>
            </div>
            <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            DateTime</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            Mail-Address</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            hair-Cut</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                            Designer</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($appoints as $appoint)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{$appoint->appoint_st}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{$appoint->mem_id}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{$appoint->mem_email}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            {{$appoint->hair_style}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5">
                            {{$designer_name[$appoint->designer]}}
                        </td>
                    </tr>
                    @endforeach
                    <tr class="text-center">
                        <td>
                        </td>
                        <td>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5 text-left">
                            <a href="/mypage?page={{ $startPage }}">◀◀</a>
                          <span class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 text-sm leading-5">
                            <?php 
                            if($pageNum == 1) {
                              echo "◀</span>";
                            } else { 
                              echo '<a href="/mypage?page='.($pageNum-1).'">◀</a></span>';
                            } 
                            if($pageNum == $totalPage) { 
                              echo '<span class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 text-sm leading-5">▶</span>';
                            } else { 
                              echo '<span class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5"><a href ="/mypage?page='.($pageNum+1).'">▶</a></span>';
                            } ?>
                            <a href = "/mypage?page={{ $endPage }}">▶▶</a>
                        </td>
                      </tr>
                </tbody>
            </table>
        </div>
    </div>
</form>
@endsection