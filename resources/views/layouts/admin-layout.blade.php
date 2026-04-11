<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard - @yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app-basis.css')}}">
</head>
<body>
    <div class="w-screen h-15 flex justify-between items-center">
        <h1 class=" text-white font-bold">
            @if (Auth::guard('admin')->check())
                {{ Auth::guard('admin')->user()->email }}
            @endif
        </h1>
        <a href="{{ route('logout')}}" class=" bg-green-600 text-white px-4 py-2 rounded-md">logout</a>
    </div>
    @yield('page-content')
</body>
</html>