@extends('layouts.menu-layout')

@section('page-title')
    {{ "Cart"}}
@endsection

@section('app-content')
    <div class="w-full p-7">
        <h1 class=" font-bold text-black lexend text-4xl">Cart</h1>
    </div>
    @if ($viewData['itemsInfo'])
        <p class=" w-full px-5 font-bold text-3xl rubik text-black">No Items Here</p>
    @endif
    <div class="w-fit mx-auto px-5 grid grid-cols-2 gap-5 p-3 justify-center">
        @foreach ($viewData['itemsInfo'] as $item)
            <div class="w-50 h-60 shrink bg-lime-100 rounded-3xl border-2 shadow-md border-gray-100 p-4 overflow-hidden flex flex-col justify-between gap-3">
                <img src="{{ $item->image}}" alt="" class=" w-25 mx-auto mix-blend-multiply">
                <span>
                    <p>Quantity : {{$item->pivot->quantity}} </p>
                    <p>₹{{ $item->price }}</p>
                </span>
                <div class="w-full flex justify-between items-center">
                    <p class=" font-bold rubik">Total ₹{{ $item->price * $item->pivot->quantity }}</p>
                    <a href="" class=" p-2 rounded-4xl bg-white"><svg viewBox="0 0 512 512" class=" w-5 h-5 fill-red-400"><path d="M448,85.333h-66.133C371.66,35.703,328.002,0.064,277.333,0h-42.667c-50.669,0.064-94.327,35.703-104.533,85.333H64   c-11.782,0-21.333,9.551-21.333,21.333S52.218,128,64,128h21.333v277.333C85.404,464.214,133.119,511.93,192,512h128   c58.881-0.07,106.596-47.786,106.667-106.667V128H448c11.782,0,21.333-9.551,21.333-21.333S459.782,85.333,448,85.333z    M234.667,362.667c0,11.782-9.551,21.333-21.333,21.333C201.551,384,192,374.449,192,362.667v-128   c0-11.782,9.551-21.333,21.333-21.333c11.782,0,21.333,9.551,21.333,21.333V362.667z M320,362.667   c0,11.782-9.551,21.333-21.333,21.333c-11.782,0-21.333-9.551-21.333-21.333v-128c0-11.782,9.551-21.333,21.333-21.333   c11.782,0,21.333,9.551,21.333,21.333V362.667z M174.315,85.333c9.074-25.551,33.238-42.634,60.352-42.667h42.667   c27.114,0.033,51.278,17.116,60.352,42.667H174.315z"/></svg></a>
                </div>
            </div>
        @endforeach 
    </div>
@endsection