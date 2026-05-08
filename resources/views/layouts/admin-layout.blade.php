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
    <script src="{{ asset('assets/js/modals/AddWorkerModal.js')}}" defer></script>
    <script src="{{ asset('assets/js/modals/EditWorkerModal.js')}}" defer></script>
</head>
<body>
    <div class="grid grid-cols-[280px_auto]">
        <aside class="w-full h-screen p-6 border-r-2 border-gray-200">
            <div class="w-full pb-6">
                <h1 class="text-blue-500 font-bold text-3xl lobster">Brand</h1>
            </div>
            <div class=" w-full py-5 px-2 bg-gray-100 rounded-lg flex justify-evenly items-center border border-gray-200" id="usercard">
                <img src="{{ asset('assets/images/Profile-Male-PNG.webp')}}" id="userprofile" class=" rounded-4xl w-10">
                <div id="details" class="grid">
                    <h1 class=" text-black font-bold capitalize leading-4 mb-1">{{ Auth::guard('admin')->user()->admin_name }}</h1>
                    <p class="text-xs">{{ Auth::guard('admin')->user()->role }}</p>
                </div>
                <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" fill-green-500"><path d="M420-360h120l-23-129q20-10 31.5-29t11.5-42q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 23 11.5 42t31.5 29l-23 129Zm60 280q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z"/></svg>
            </div>
            {{-- sidenav start  --}}
            
            @switch (Auth::guard('admin')->user()->role)
                @case ('administrator')
                    @include('components.admin-nav-links')
                    @break

                @case ('waiter')
                    @include('components.waiter-nav-links')
                    @break

                @case ('kitchen')
                    @include('components.kitchen-nav-links')
                    @break
                
                @default
                    {{'no links'}}
                    @break
            @endswitch
            {{-- sidenav end  --}}
        </aside>

        {{-- page contents  --}}
        <div class="w-full h-screen px-5">
            <nav class="w-full flex justify-between px-3 py-2 items-center shadow-2xs">
                <a href="" class=" font-medium bg-green-100 px-2 rounded-3xl text-sm text-green-500">Restaurent</a>
                <a href="{{ route('logout')}}" class=" flex flex-row text-sm items-center text-green-600 px-4 py-2 rounded-md font-medium bg-green-100">
                    <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" fill-green-600"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg> Logout
                </a>
            </nav>
            <div class=" w-full h-[calc(100vh-60px)] flex flex-col gap-6 flex-nowrap p-6 overflow-y-scroll">
                @yield('page-content')
            </div>
        </div>
    </div>
</body>
</html>