@extends('layouts.app-layout')
@section('page-title')
    {{ 'Home' }}
@endsection

@section('app-content')
    <div class="w-screen flex flex-col justify-start items-center" id="main">
        <div class="w-full flex items-center justify-center flex-col ">
            <h1 class="font-bold text-5xl text-white mt-8">Welcome</h1>
            <p class=" text-white">Please scan the QR to get your table.</p>
        </div>
        <div class="w-full flex justify-center items-center flex-col pt-7">
            <h1 class=" montserrat font-black text-5xl">Scanner</h1>
            <p class=" rubik text-gray-500">Scan the QR Code</p>
        </div>
    </div>
@endsection