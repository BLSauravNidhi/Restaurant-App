<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard - @yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app-basis.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-classes.css')}}">
    <script src="{{ asset('assets/js/dropdown-sidenav-admin.js')}}" defer></script>
</head>
<body>
    <div class="grid grid-cols-[280px_auto]">
        {{-- sidenav start  --}}
        <aside class="w-full h-screen p-6 border-r-2 border-gray-200">
            <div class="w-full pb-6">
                <h1 class="text-blue-500 font-bold text-3xl lobster">Brand</h1>
            </div>
            <div class=" w-full py-5 px-2 bg-gray-100 rounded-lg flex justify-evenly items-center border border-gray-200" id="usercard">
                <img src="{{ asset('assets/images/Profile-Male-PNG.webp')}}" id="userprofile" class=" rounded-4xl w-10">
                <div id="details" class="grid">
                    <h1 class=" text-black font-bold capitalize">{{ Auth::guard('admin')->user()->admin_name }}</h1>
                    <p class="text-xs">{{ Auth::guard('admin')->user()->role }}</p>
                </div>
                <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" fill-green-500"><path d="M420-360h120l-23-129q20-10 31.5-29t11.5-42q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 23 11.5 42t31.5 29l-23 129Zm60 280q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z"/></svg>
            </div>
            <div id="navigationbar" class=" w-full">

                <div class=" w-full my-5 ">
                    <p class="text-sm font-medium">Navigation</p>
                    <div class="flex flex-col text-sm lexend font-medium gap-1">
                        <button class=" {{ (request()->routeIs('AdminDashboard') || request()->routeIs('AdminAnalytics')) ? 'current-tab' : ''}} dropdown-btn outline-0 fill-gray-500 text-left py-2 px-4 rounded-md text-gray-500 flex flex-row flex-nowrap gap-2 items-center">
                            <svg height="24px" viewBox="0 -960 960 960" width="24px"><path d="M640-160v-280h160v280H640Zm-240 0v-640h160v640H400Zm-240 0v-440h160v440H160Z"/></svg>
                            Dashboard
                            <div class="arrow ml-auto pointer-events-none">
                                <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" arrow-up"><path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z"/></svg>
                                <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" hidden arrow-down"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                            </div>
                        </button>
                        <ul class=" h-0 overflow-hidden dropdown-list w-full list-disc list-inside flex flex-col gap-1">
                            <a href="{{ route('AdminDashboard')}}">
                                <li class=" {{ request()->routeIs('AdminDashboard') ? 'current-sub-tab' : ''}} py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Default</li></a>
                            <a href="{{ route('AdminAnalytics')}}">
                                <li class=" {{ request()->routeIs('AdminAnalytics') ? 'current-sub-tab' : ''}} py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Analytics</li></a>
                            <a href="">
                                <li class=" py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Finance</li></a>
                        </ul>
                    </div>

                    <div class="flex flex-col text-sm lexend font-medium gap-1">
                        <button class=" dropdown-btn outline-0 fill-gray-500 text-left py-2 px-4 rounded-md text-gray-500 flex flex-row flex-nowrap gap-2 items-center">
                            <svg height="24px" viewBox="0 -960 960 960" width="24px"><path d="M287-527q-47-47-47-113t47-113q47-47 113-47t113 47q47 47 47 113t-47 113q-47 47-113 47t-113-47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm96.5-143.5Q760-287 760-320t-23.5-56.5Q713-400 680-400t-56.5 23.5Q600-353 600-320t23.5 56.5Q647-240 680-240t56.5-23.5Zm-280-320Q480-607 480-640t-23.5-56.5Q433-720 400-720t-56.5 23.5Q320-673 320-640t23.5 56.5Q367-560 400-560t56.5-23.5ZM400-640Zm12 400Z"/></svg>
                            Manage Staff
                            <div class="arrow ml-auto pointer-events-none">
                                <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" arrow-up"><path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z"/></svg>

                                <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" hidden arrow-down"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                            </div>
                        </button>
                        <ul class=" h-0 overflow-hidden dropdown-list w-full list-disc list-inside flex flex-col gap-1">
                            <a href=""><li class=" py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Manage</li></a>
                            <a href=""><li class=" py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Privileges</li></a>
                        </ul>
                    </div>
                </div>

                <div class="w-full my-5">
                    <p class="text-sm font-medium">Admin Panel</p>
                    <div class="flex flex-col text-sm lexend font-medium gap-1">
                        <button class=" dropdown-btn outline-0 fill-gray-500 text-left py-2 px-4 rounded-md text-gray-500 flex flex-row flex-nowrap gap-2 items-center">
                            <svg height="24px" viewBox="0 -960 960 960" width="24px"><path d="M287-527q-47-47-47-113t47-113q47-47 113-47t113 47q47 47 47 113t-47 113q-47 47-113 47t-113-47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm96.5-143.5Q760-287 760-320t-23.5-56.5Q713-400 680-400t-56.5 23.5Q600-353 600-320t23.5 56.5Q647-240 680-240t56.5-23.5Zm-280-320Q480-607 480-640t-23.5-56.5Q433-720 400-720t-56.5 23.5Q320-673 320-640t23.5 56.5Q367-560 400-560t56.5-23.5ZM400-640Zm12 400Z"/></svg>
                            Admin settings
                            <div class="arrow ml-auto pointer-events-none">
                                <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" arrow-up"><path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z"/></svg>

                                <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" hidden arrow-down"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                            </div>
                        </button>
                        <ul class=" h-0 overflow-hidden dropdown-list w-full list-disc list-inside flex flex-col gap-1">
                            <a href=""><li class=" py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Change Credentials</li></a>
                        </ul>
                    </div>
                </div>
                    
            </div>
        </aside>
        {{-- sidenav end  --}}

        {{-- page contents  --}}
        <div class="w-full h-screen px-5">
            <nav class="w-full flex justify-between px-3 py-2 items-center shadow-2xs">
                <a href="" class=" font-medium bg-green-100 px-2 rounded-3xl text-sm text-green-500">Restaurent</a>
                <a href="{{ route('logout')}}" class=" flex flex-row text-sm items-center text-green-600 px-4 py-2 rounded-md font-medium bg-green-100">
                    <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" fill-green-600"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg> Logout
                </a>
            </nav>
            <div class=" w-full min-h-[calc(100vh-60px)] flex flex-col gap-6 flex-nowrap p-6">
                @yield('page-content')
            </div>
        </div>
    </div>
</body>
</html>