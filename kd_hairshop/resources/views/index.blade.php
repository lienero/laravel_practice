@extends('layouts.main')
@extends('layouts.sliderbox')
@extends('layouts.nav_bar')
@extends('layouts.footer')
@section('content')

<div class="container mx-auto">
    <p class="text-xl bg-gray-500 pl-10 font-bold pt-5">  
        <img src ="/img/leaf_crown.png" class="w-10 h-10 inline-block"> ヘアスタイルランキング
    </p>
  <div class="grid grid-cols-3 bg-gray-500 place-items-center">
    <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-auto">
    <img class="w-full object-cover h-48 overflow-hidden" src="/img/cut1.jpg" >
    <div class="px-6 py-4 bg-gray-600">
      <div class="font-bold text-xl mb-2">ツーブロック</div>
      <p class="text-grey-darker text-base font-semibold">
        ツーブロックとは、ヘアデザインを表す名称のひとつ。おもに、トップが長め、トップ以下（サイドやえり足）が短めにカットされた髪型を指しています。
      </p>
    </div>
    <div class="px-6 py-4 bg-gray-600 ">
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#KD-hair</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#ツーブロック</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#man's hairstyle</span>
    </div>
  </div>
  <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-auto">
    <img class="w-full object-cover h-48 overflow-hidden"src="/img/cut2.jpg">
    <div class="px-6 py-4 bg-gray-600">
      <div class="font-bold text-xl mb-2">シースルーバング</div>
      <p class="text-grey-darker text-base font-semibold">
        シースルーバング】は、前髪に軽さやヌケ感、そしておしゃれな印象を演出できる、と多くの女の子たちの心をくすぐる、いま注目の前髪なんです。【シースルーバング】の魅力！
      </p>
    </div>
    <div class="px-6 py-4 bg-gray-600">
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#KD-hair</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#シースルーバング</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#woman's hairstyle</span>
    </div>
  </div>
  <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-auto">
    <img class="w-full object-cover h-48 overflow-hidden" src="/img/cut3.jpg">
    <div class="px-6 py-4 bg-gray-600">
      <div class="font-bold text-xl mb-2">ストレートボブ</div>
      <p class="text-grey-darker text-base font-semibold">
        自然な質感のストレートボブは、幅広い女性にとても人気のスタイルです。
        清楚な雰囲気のボブ・クールな雰囲気のボブなど、幅広いボブスタイルに似合わせやすいのが魅力です。
        
      </p>
    </div>
    <div class="px-6 py-4 bg-gray-600">
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#KD-hair</span>
      <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#ストレートボブ</span>
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
        <div class="uppercase tracking-wide text-base text-indigo-500 font-bold">MEN's FASHION</div>
        <a href="naver.com" class="block mt-1 text-sm leading-tight text-black hover:underline font-semibold">2021年３月号</a>
        <p class="mt-2 text-gray-500 font-semibold overflow-hidden">おしゃれ男子に向けた最新ファッションを中心に、流行を取り入れた最旬スタイルから人気ブランド＆新作アイテム、ハイセンスなコーディネートなど紹介しています。
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
        <div class="uppercase tracking-wide text-base text-indigo-500 font-bold">FASHION AGE</div>
        <a href="naver.com" class="block mt-1 text-sm leading-tight text-black hover:underline font-semibold">2021年３月号</a>
        <p class="mt-2 text-gray-500 font-semibold overflow-hidden">「アラサーからはきれいな女らしさに乗り換える！」<br>
          シンプルだけれど女らしい、ベーシックだけれど更新感がある、そんなスタイルがある</p>
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
        <div class="uppercase tracking-wide text-base text-indigo-500 font-bold">FASHION BEAUTY</div>
        <a href="naver.com" class="block mt-1 text-sm leading-tight text-black hover:underline font-semibold">2021年３月号</a>
        <p class="mt-2 text-gray-500 font-semibold overflow-hidden">「アラサーからはきれいな女らしさに乗り換える！」<br>
          シンプルだけれど女らしい、<br>ベーシックだけれど更新感がある</p>
      </div>
    </div>
  </div>
  <br>
</div>
@endsection

