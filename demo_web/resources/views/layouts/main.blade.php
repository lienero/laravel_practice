<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo Web App</title>

    <!-- Tailwind Css Style -->
    <!--<link rel="stylesheet" href="/css/main.css">-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- Fomtatwesome -->
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
                <ul class="flex flex-col md:flex-row items-cneter">
                    <li class="md:ml-16 mt-3 md:mt-0">
                        <a href="#" class="hover:text-gray-300">Home Title(img)</a>
                    </li>
                    <li class="md:ml-16 mt-3 md:mt-0">
                        <a href="#" class="hover:text-gray-300">item 1</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="#" class="hover:text-gray-300">item 2</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="#" class="hover:text-gray-300">item 3</a>
                    </li>
                </ul>

                <div class="flex flex-col md:flex-row items-center">
                    <div class="relative mt-3 md:mt-0">
                        <input type="text" class="bg-gray-800 rounded-full w-64 pl-8 px-4 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
                        <div class="absolute top-0">
                            <i class="fas fa-search mt-2 ml-3"></i>
                        </div>
                    </div>
                    <div class="md:ml-4 mt-3 md:mt-0">
                        <a href="#">
                            <!--<img src="/img/avatar.png" alt="avatar" class="rounded-full w-8 h-8">-->
                        </a>
                    </div>
                </div>
            </div>
    </nav>

    @yield('content')
</body>

</html>