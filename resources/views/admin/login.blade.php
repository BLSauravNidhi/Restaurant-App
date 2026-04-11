<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Restaurent Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app-basis.css')}}">
</head>
<body>
    <div class="w-screen h-screen bg-gray-900 flex flex-col justify-start items-center">
        <div class="w-screen min-h-20 mt-6">
            @if ($errors->has('email'))
            <p class=" px-4 py-1.5 bg-amber-200 text-red-500 w-fit mx-auto rounded-md outline outline-amber-700">{{ $errors->first('email') }}</p>
        @endif
        </div>
        <div class="w-screen flex flex-col justify-center items-center h-full">
            <div class=" w-fit bg-white shadow-md rounded-md p-5">
                <form action="{{ route('authenticateAdmin')}}" method="post" class=" flex flex-col gap-5">
                    @csrf
                    @method('POST')
                    <span class=" relative">
                        {{-- <label for="username" class=" absolute top-1/5 left-3">Username</label> --}}
                        <input type="text" id="username" name="email" placeholder="Email" class=" px-3 py-2 outline outline-gray-400">
                    </span>
                    <span class=" relative">
                        {{-- <label for="password" class=" absolute top-1/5 left-3">Password</label> --}}
                        <input type="text" id="password" name="password" placeholder="Password" class=" px-3 py-2 outline outline-gray-400">
                    </span>
                    <button type="submit" class=" w-fit bg-blue-600 py-1 px-4 rounded-md text-white font-bold">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>