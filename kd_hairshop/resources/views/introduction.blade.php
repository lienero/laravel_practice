@extends('layouts.main')
@extends('layouts.footer')
@section('content')

<div class="section bg-image flex overflow-hidden h-screen text-gray-800">
    <div class="hero bg-gray-200 text-center grid md:grid-cols-2 border w-4/6 m-auto p-8 bg-opacity-90 rounded-lg">
      <img class="icon m-auto rounded-lg" src="/img/intro_0.jpg" alt="" />
      <div class="text m-auto text-lg md:ml-5 p-5 md:text-left">
        <div class="head text-4xl mb-3 font-bold">KD-hairshop</div>
        <div class="desc text-xl font-semibold">ヘアースタイルは<br>単に乱れた髪を整えることではありません。<br> 
          人を変えられる力です。</div>
      </div>
    </div>
  </div>
  
  <div class="heading_section italic bg-gray-200 font-semibold text-3xl text-center p-5 pt-24 text-gray-800">モダンなスタイルのインテリア</div>
  <div class="section cards mx-auto border grid md:grid-cols-3 md:px-12 bg-gray-200 text-gray-800">
    <div class="card text-sm shadow-lg mx-3 overflow-hidden flex flex-col rounded">
      <div class="img"><img class="w-full h-full" src="/img/intro_2.png" alt="" /></div>
      <div class="text p-5 pt-2 text-center">
        <div class="title font-semibold my-2 text-xl text-red-700">重厚</div>
        <div class="desc text-lg font-semibold">KD-hairshopは入った時から他の美容室と違う重厚さがあります。 雰囲気に合わせた最上のサービス、<br>ヘアスタイルをご提供します。</div>
      </div>
    </div>
    <div class="card text-sm shadow-lg mx-3 overflow-hidden flex flex-col rounded">
      <div class="img"><img class="w-full h-full" src="/img/intro_3.png" alt="" /></div>
      <div class="text p-5 pt-2 text-center">
        <div class="title font-semibold my-2 text-xl text-red-700">時にはカフェ、時にはバー</div>
        <div class="desc text-lg font-semibold">KD-harishopは単に髪を切るところだけではありません<br> お客様がご希望ならカフェになることもできますが、<br>時にバーになることもあります。</div>
      </div>
    </div>
    <div class="card text-sm shadow-lg mx-3 overflow-hidden flex flex-col rounded">
      <div class="img"><img class="w-full h-full" src="/img/intro_4.png" alt="" /></div>
      <div class="text p-5 pt-2 text-center">
        <div class="title font-semibold my-2 text-xl text-red-700">木の香り</div>
        <div class="desc text-lg font-semibold">KD-harishopは木材インテリアを使用して入ってきた時に<br>索漠とした都市の中から森に入ったような香りがします。</div>
      </div>
    </div>
  </div> 
  <div class="section py-28 w-full scree border grid md:grid-cols-2 bg-gray-200 text-gray-800 pt-10 pb-10">
    <div class="subsec flex-none overflow-hidden max-h-96">
      <img class="w-full" src="/img/intro_5.jpg" alt="" />
    </div>
    <div class="subsec my-auto p-8">
      <div class="title font-semibold text-3xl mb-5">自分に最もふさわしいヘアスタイルを知りたいですか？</div>
      <div class="desc text-lg font-semibold">KD-harishopは髪を切る前に職員と十分に話し合った後、<br>仮想ヘアカットシステムを使用して髪を切る前に完成されたヘアスタイルを確認できます。<br>自分に合ったヘアスタイルで自信のある生活を過ごしてみてください。</div>
    </div>
  </div>
  
@endsection
