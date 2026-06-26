@extends('layouts.menu-layout')

@section('page-title')
    {{ "My Orders"}}
@endsection

@section('app-content')
    <div class=" w-full px-5 h-15 flex flex-col items-start">
        <h3 class="font-bold lexend">My Orders</h3>
        <p class="text-gray-400 inter text-sm">Please refresh to see new updates.</p>
    </div>
    <section class=" max-w-3xl mx-auto p-8 flex flex-wrap justify-center gap-3">

        {{-- cancelled order template  --}}
        {{-- <a href="">
            <div class=" w-80 h-32 rounded-2xl bg-gray-50 shadow-2xs grid grid-cols-[100px_auto] py-3 px-2 overflow-hidden items-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2f0_e4yGqNqCirPNlWpCTX1_gYRdwzI9mrjapBbb-oiWErUvW-BDz7uQ&s=10" alt="" class=" mix-blend-multiply scale-75">
                <div class=" px-2 py-3 flex flex-col flex-nowrap gap-1.5 ">
                    <h6 class=" font-bold text-xs rubik text-gray-600">Order Number : #2546</h6>
                    <p class=" font-bold text-xs rubik text-gray-600">Total Amount : ₹748</p>
                    <span class=" w-fit px-1 py-0.5 font-medium text-xs capitalize rubik rounded-sm bg-red-100 text-red-500">cancelled</span>
                    <a href="" class=" text-xs font-medium inter">View >></a>
                </div>
            </div>
        </a> --}}

        @foreach ($viewData['orders'] as $order)
            <a href="">
                <div class=" w-80 h-32 rounded-2xl bg-gray-50 shadow-2xs grid grid-cols-[100px_auto] py-3 px-2 overflow-hidden items-center">
                    <img src="https://uxwing.com/wp-content/themes/uxwing/download/e-commerce-currency-shopping/order-placed-purchased-icon.svg" alt="" class=" mix-blend-multiply scale-75">
                    <div class=" px-2 py-3 flex flex-col gap-1.5 ">
                        <h6 class=" font-bold text-xs rubik text-gray-600">Order Number : #{{$order->id}}</h6>
                        <p class=" font-bold text-xs rubik text-gray-600">Total Amount : ₹{{$order->total_amount}}</p>
                        <span class=" w-fit px-1 py-0.5 font-medium text-xs capitalize rubik rounded-sm bg-green-100 text-green-500">{{ $order->status}}</span>
                        <a href="" class=" text-xs font-medium inter">View >></a>
                    </div>
                </div>
            </a>
        @endforeach

        {{-- <a href="">
            <div class=" w-80 h-32 rounded-2xl bg-gray-50 shadow-2xs grid grid-cols-[100px_auto] py-3 px-2 overflow-hidden items-center">
                <img src="https://uxwing.com/wp-content/themes/uxwing/download/e-commerce-currency-shopping/order-placed-purchased-icon.svg" alt="" class=" mix-blend-multiply scale-75">
                <div class=" px-2 py-3 flex flex-col gap-1.5 ">
                    <h6 class=" font-bold text-xs rubik text-gray-600">Order Number : #2546</h6>
                    <p class=" font-bold text-xs rubik text-gray-600">Total Amount : ₹748</p>
                    <span class=" w-fit px-1 py-0.5 font-medium text-xs capitalize rubik rounded-sm bg-green-100 text-green-500">prepairing</span>
                    <a href="" class=" text-xs font-medium inter">View >></a>
                </div>
            </div>
        </a> --}}
        
    </section>
@endsection