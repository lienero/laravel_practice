@extends('layouts.main')
@extends('layouts.footer')
@section('content')

<div class="min-h-screen flex items-center justify-center bg-blue-100 py-12 px-4 sm:px-6 lg:px-8">

    <img  style="border:20px;margin:50px;float:left;width:500px;height: 500px;" class="object-cover" src="/img/main_login.jpg">
     <hr>

    <div class="max-w-md w-full space-y-8">
        
      <div>
        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
            パスワードリセット
        </h2>
      </div>
      <form class="mt-8 space-y-6" action="/login/password_set" method="POST">
        @csrf
      <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">ID</label>
            <input id="email-address" name="id" type="text" autocomplete="id" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="ID" required>
          </div>
          <br>
          <div>
            <label for="password" class="sr-only">Email address</label>
            <input id="password" name="email" type="text" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Email address" required>
          </div>
          <br>
          <div>
            <label for="password" class="sr-only">パスワード</label>
            <input type="password" name="password" id="pw"  type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="新しいパスワード" onKeyup="safetyPasswordPattern(this); isSame();" required>
          </div>
          <div class="sm:text-sm text-gray-900" id="makyText">:: パスワードをご入力ください ::</div>
          <br>
        </div>
  
        <div>
          <button id="signin" type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-semibold rounded-md text-white bg-blue-600 hover:bg-lightblue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-50" aria-required="true">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: lock-closed -->
              <svg class="h-5 w-5 text-blue-50 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            パスワードリセット
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection