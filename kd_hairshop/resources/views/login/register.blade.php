@extends('layouts.main')
@extends('layouts.footer')
@section('content')
<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
      <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
        <div class="max-w-md mx-auto">
          <div class="flex items-center space-x-5">
            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
              <h2 class="leading-relaxed">新規登録</h2>
              <p class="text-base text-gray-500 leading-relaxed font-semibold">kd-hairshopへの登録を誠に歓迎します。</p>
            </div>
          </div>
          <div class="divide-y divide-gray-200">
            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
              <div class="flex flex-col">
                <label class="leading-loose font-semibold">ID</label>
                <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="ID">
              </div>
              <div class="flex flex-col">
                <label class="leading-loose font-semibold">パスワード</label>
                <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Password">
              </div>
              
              <div class="flex flex-col">
                <label class="leading-loose font-semibold">パスワード確認</label>
                <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Password">
              </div>
              <div class="flex flex-col">
                <label class="leading-loose font-semibold">メールアドレス</label>
                <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Mail address">
              </div>
              <div class="flex flex-col">
                <span
                    class="text-sm text-gray-700 dark:text-gray-400
                    mt-2">
                    <label class="flex items-center">
                        <span class="ml-2 text-black text-sm font-semibold">※本当に加入しますか</span>
                        <input type="checkbox" class="form-checkbox ab" name="">
                    </label>
                </span>
                </div>
            </div>
            <div class="pt-4 flex items-center space-x-4">
                <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none font-semibold text-lg">加入</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection