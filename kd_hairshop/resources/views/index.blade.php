@extends('layouts.main')
@extends('layouts.sliderbox')
@extends('layouts.nav_bar')
@extends('layouts.footer')
@section('content')

<div class="container mx-auto">
    <p class="text-xl bg-gray-500 pl-10 font-bold pt-5">  
        <img src ="/img/leaf_crown.png" class="w-10 h-10 inline-block"> ヘアスタイルランキング
    </p>
  <div class="grid grid-cols-3 bg-gray-500">
    <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-auto">
    <img class="w-full object-cover h-48 overflow-hidden" src="/img/cut1.jpg" >
    <div class="px-6 py-4 bg-gray-600">
      <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
      <p class="text-grey-darker text-base">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
      </p>
    </div>
    <div class="px-6 py-4 bg-gray-600">
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#KD-hair</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#two-block</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#man's hairstyle</span>
    </div>
  </div>
  <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-auto">
    <img class="w-full object-cover h-48 overflow-hidden"src="/img/cut2.jpg">
    <div class="px-6 py-4 bg-gray-600">
      <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
      <p class="text-grey-darker text-base">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
      </p>
    </div>
    <div class="px-6 py-4 bg-gray-600">
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#KD-hair</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#longhair</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#woman's hairstyle</span>
    </div>
  </div>
  <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-auto">
    <img class="w-full object-cover h-48 overflow-hidden" src="/img/cut3.jpg">
    <div class="px-6 py-4 bg-gray-600">
      <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
      <p class="text-grey-darker text-base">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
      </p>
    </div>
    <div class="px-6 py-4 bg-gray-600">
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#KD-hair</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#shorthair</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#woman's hairstyle</span>
    </div>
  </div>

  </div>
</div>

<div class="container mx-auto kd_bg">
<br>
  <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl ">
    <div class="md:flex fles-row">
      <div class="md:flex-shrink-0">
        <img class="h-48 w-full object-cover md:w-48" src="/img/magazine1.png">
      </div>
      <div class="p-8">
        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Case study</div>
        <a href="naver.com" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Finding customers for your new business</a>
        <p class="mt-2 text-gray-500">Getting a new business off the ground is a lot of hard work. Here are five ideas you can use to find your first customers.</p>
      </div>
    </div>
  </div>

  <br>
  <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="md:flex">
      <div class="md:flex-shrink-0">
        <img class="h-48 w-full object-cover md:w-48" src="/img/magazine2.png">
      </div>
      <div class="p-8">
        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Case study</div>
        <a href="naver.com" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Finding customers for your new business</a>
        <p class="mt-2 text-gray-500">Getting a new business off the ground is a lot of hard work. Here are five ideas you can use to find your first customers.</p>
      </div>
    </div>
  </div>

  <br>
  <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
    <div class="md:flex">
      <div class="md:flex-shrink-0">
        <img class="h-48 w-full object-cover md:w-48" src="/img/magazine3.png">
      </div>
      <div class="p-8">
        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Case study</div>
        <a href="naver.com" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Finding customers for your new business</a>
        <p class="mt-2 text-gray-500">Getting a new business off the ground is a lot of hard work. Here are five ideas you can use to find your first customers.</p>
      </div>
    </div>
  </div>
  <br>
</div>
@endsection

