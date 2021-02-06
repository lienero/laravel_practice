<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    @yield('metatag')
    <!-- 헤드 부분. -->
    <title>@yield('title')</title> <!-- 타이틀 제목 -->
    @yield('style')
    <!-- 스타일 컨텐츠가 들어갈 부분 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    @include('sweetalert::alert')
    @yield('content')
    <!-- body 컨텐츠가 들어갈 부분 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    @yield('script')
    <!-- script가 들어갈 부분 -->
</body>

</html>