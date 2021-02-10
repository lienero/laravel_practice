@extends('layouts.main')
@section('content')
<form action="/manager/shift_management" method="POST">
    {{-- @csrf : CSRF(크로스-사이트 요청 위조 공격)으로부터 보호 --}}
    @csrf
    <?php
    for($i =1; $i<7; $i++){
        $staff = 'staff_'.$i;
    ?>
    <div class="container mx-auto flex flex-row mt-2">
        <div
            class="flex w-full items-center justify-between bg-white
            dark:bg-gray-800 px-8 py-6">
            <!-- card -->
            <div class="flex">
                <img
                    class="h-12 w-12 rounded-full object-cover"
                    src="/img/cut2.jpg"/>

                <div class="flex flex-col ml-6">
                    <span class="text-lg font-bold text-black">{{$staff}}</span>
                    <div class="mt-4 flex">
                        <div class="flex">
                            <svg
                                class="h-5 w-5 fill-current
                                dark:text-gray-300"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 4a4 4 0 014 4 4 4 0 01-4 4
                                    4 4 0 01-4-4 4 4 0 014-4m0
                                    10c4.42 0 8 1.79 8
                                    4v2H4v-2c0-2.21 3.58-4 8-4z"></path>
                            </svg>
                            <span
                                class="ml-2 text-sm text-gray-600
                                dark:text-gray-300 capitalize">
                                10:00~ 20:00
                            </span>
                        </div>

                        <div class="flex ml-6">
                            <svg
                                class="h-5 w-5 fill-current
                                dark:text-gray-300"
                                viewBox="0 0 24 24">
                                <path
                                    d="M19
                                    19H5V8h14m-3-7v2H8V1H6v2H5c-1.11
                                    0-2 .89-2 2v14a2 2 0 002 2h14a2 2
                                    0 002-2V5a2 2 0 00-2-2h-1V1m-1
                                    11h-5v5h5v-5z"></path>
                            </svg>
                            <span
                                class="ml-2 text-sm text-gray-600
                                dark:text-gray-300 capitalize">
                                毎週月・水・金出勤
                            </span>
                        </div>

                        <div class="flex ml-6">
                            <svg
                                class="h-5 w-5 fill-current
                                dark:text-gray-300"
                                viewBox="0 0 24 24">
                                <path
                                    d="M13 2.05v2.02c3.95.49 7 3.85 7
                                    7.93 0 3.21-1.92 6-4.72 7.28L13
                                    17v5h5l-1.22-1.22C19.91 19.07 22
                                    15.76 22
                                    12c0-5.18-3.95-9.45-9-9.95M11
                                    2c-1.95.2-3.8.96-5.32 2.21L7.1
                                    5.63A8.195 8.195 0 0111 4V2M4.2
                                    5.68C2.96 7.2 2.2 9.05 2
                                    11h2c.19-1.42.75-2.77
                                    1.63-3.9L4.2 5.68M6
                                    8v2h3v1H8c-1.1 0-2 .9-2
                                    2v3h5v-2H8v-1h1c1.11 0 2-.89
                                    2-2v-1a2 2 0 00-2-2H6m6
                                    0v5h3v3h2v-3h1v-2h-1V8h-2v3h-1V8h-2M2
                                    13c.2 1.95.97 3.8 2.22
                                    5.32l1.42-1.42A8.21 8.21 0 014
                                    13H2m5.11 5.37l-1.43 1.42A10.04
                                    10.04 0 0011 22v-2a8.063 8.063 0
                                    01-3.89-1.63z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <span
                    class="text-sm text-gray-700 dark:text-gray-400
                    mt-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox ab" name="checked[]" value="{{$staff}}">
                        <span class="ml-2 text-black text-2xl font-semibold">出勤</span>
                    </label>
                </span>
            </div>
        </div>
    </div>
    <?php } ?>
    <br>
    <div class="container mx-auto flex flex-row-reverse">
        <input type="hidden" name="date" value="{{$date}}">
        <button type="submit" class="mx-auto px-5 py-2 border-blue-500 border bg-white text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none font-semibold">確認</button>
    </div>
</form>
@endsection