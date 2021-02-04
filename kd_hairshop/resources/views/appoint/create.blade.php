@extends('layouts.main')
@section('content')

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
                <input class="mx-auto tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block  w-sp bg-gray-200 border border-gray-200 rounded-lg focus:outline-none focus:bg-white focus:border-gray-500 focus:text-black"
                id="name" type="text" placeholder="予約者名" required style="color :black; font-weight:bold;">
                <label for="name" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text text-black" >
                </label>
            </div>
            <div class="appearance-none label-floating">
                <input class="mx-auto tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-sp bg-gray-200 border border-gray-200 rounded-lg focus:outline-none focus:bg-white focus:border-gray-500 focus:text-black"
                id="name" type="text" placeholder="電話番号" required style="color :black; font-weight:bold;">
                <label for="name" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                </label>
            </div>
</div>
<div class="container mx-auto">
        <div class="" mbsc-form style="">
            <div class="mbsc-grid mbsc-form-grid">
                    <div class="mx-auto mbsc-col-sm-12 mbsc-col-md-6">
                        <label>
                            職員選び
                            <select mbsc-dropdown id="demo-desktop" data-input-style="box">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>>
                            </select>
                        </label>
                        <label>
                            時間選び
                            <select mbsc-dropdown id="demo-mobile" data-input-style="box">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </label>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="flex justify-center">
    <a href="" class="bg-gray-900 rounded-lg font-bold text-lg text-white text-center px-4 py-3 transition duration-300 ease-in-out hover:bg-gray-200 hover:text-gray-900 mr-6">
        予約
    </a>
</div>

@endsection