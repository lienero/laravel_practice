<body>
@section('sliderbox')
<br>
<div class="sliderAx h-auto">
      <div id="slider-1" class="container mx-auto">
        <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(/img/sliderbox1.jpg)">
          <div class="md:w-1/2">
          <p class="text-3xl font-bold">KD-hairshop</p>
          <p class="text-2xl mb-10 leading-none">あなたに合う最高のスタイルを...</p>
          <a href="/introduction" class="bg-gray-700 py-4 px-8 text-white font-bold uppercase text-xl rounded hover:bg-gray-200 hover:text-gray-700">詳しく</a>
          </div>  
        </div> <!-- container -->
      </div>

      <div id="slider-2" class="container mx-auto">
        <div class="bg-cover bg-top  h-auto text-white py-24 px-10 object-fill" style="background-image: url(/img/sliderbox2.jpg)">
        <p class="text-3xl font-bold">KD-hairshop</p>
        <p class="text-2xl mb-10 leading-none">あなたに合う最高のスタイルを...</p>
        <a href="/introduction" class="bg-gray-700 py-4 px-8 text-white font-bold uppercase text-xl rounded hover:bg-gray-200 hover:text-gray-700">詳しく</a> 
        </div> <!-- container -->
      </div>      
</div>
<!--appointment box-->
@endsection
</body>
