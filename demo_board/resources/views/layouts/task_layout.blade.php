<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @yield 는 어떤 섹션의 컨텐츠을 나타내는 데에 사용되는 지시어다. --}}
    {{-- blade파일에서 @section('yield 이름') 으로 yield 부분에 넣을 컨텐츠를 작성할 수 있고 @endsection으로 닫아줘야한다.  --}}
    {{-- 블레이드 템플릿에서 지시어를 사용할 때는 지시어 앞에 @를 붙여주고 데이터를 표시할 땐 {{ $data }} 이런 식으로 쓴다. --}}
    @yield('metatag')
    <!-- 헤드 부분. -->
    <title>@yield('title')</title> <!-- 타이틀 제목 -->
    @yield('style')
    <!-- 스타일 컨텐츠가 들어갈 부분 -->
</head>

<body>
    @yield('content')
    <!-- body 컨텐츠가 들어갈 부분 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @yield('script')
    <!-- script가 들어갈 부분 -->
</body>

</html>