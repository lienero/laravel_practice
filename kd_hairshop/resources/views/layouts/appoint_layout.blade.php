<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    @yield('metatag')
    <!-- 헤드 부분. -->
    <title>@yield('title')</title> <!-- 타이틀 제목 -->
    @yield('style')
    <!-- 스타일 컨텐츠가 들어갈 부분 -->
    <link rel="stylesheet" href="/css/index.css">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class=" bg-gray-700">
    <br>
    @include('sweetalert::alert')
    @yield('content')
    <!-- body 컨텐츠가 들어갈 부분 -->
    @yield('script')
    <!-- script가 들어갈 부분 -->
</body>

</html>