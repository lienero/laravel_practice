@section('nav_bar')
<div class="container mx-auto">
    <div class="grid grid-cols-3">
     <a href="/appoint" class=""><div class="bg-gray-800 text-center text-2xl hover:bg-gray-200 hover:text-black font-bold">予約</div></a>
      <a href="/mypage"><div class="bg-gray-700 text-center text-2xl font-bold hover:bg-gray-200 hover:text-black ">予約管理</div></a>
     <div class="bg-gray-800 text-center text-2xl font-bold "><button class="modal-open bg-transparent text-white hover:text-black hover:bg-gray-200 font-bold w-full h-full">値段</button>
    
        <!--Modal-->
        <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
          <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
          
          <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            
            <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
              <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
              <span class="text-sm">(Esc)</span>
            </div>
      
            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
              <!--Title-->
              <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-black">値段</p>
                <div class="modal-close cursor-pointer z-50">
                  <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                  </svg>
                </div>
              </div>
              <p class="text-black">カット :5,000 円（30分)</p>
              <p class="text-black">パーマ：6,000 円（1時間)</p>
              <p class="text-black">カラー：4,000 円 (1時間)</p>
           
              <!--Footer-->
              <div class="flex justify-end pt-2">
                <button class="modal-close px-4 bg-gray-800 p-3 rounded-lg text-white hover:bg-gray-600">Close</button>
              </div>
            </div>
          </div>
        </div>
         
      </div>
    </div>
  </div>
@endsection