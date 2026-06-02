<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Restaurent - @yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/customer-ui.css')}}">
</head>
<body>
    <div class=" sticky bg-white
        top-0 z-10 w-full h-15 flex flex-row flex-nowrap items-center px-4 text-black">
        <span class=" mr-auto inter text-md font-medium text-black">Join Code : {{ $sessionInfo->session_join_code}}</span>
        <p class=" w-10 flex justify-center items-center bg-lime-500 text-white rounded-4xl p-2 fill-gray-900 border-0 outline-0 font-medium lexend">{{ $sessionInfo->table_number}}</p>
    </div>
    @yield('app-content')
    <div class="w-full h-15"></div>
    @include('components.table-navbar')
    @stack('page-scripts')
</body>
</html>