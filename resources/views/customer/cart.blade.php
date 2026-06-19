@extends('layouts.menu-layout')

@section('page-title')
    {{ "Cart"}}
@endsection

@section('app-content')
    <div class="w-full p-7">
        <h1 class=" font-bold text-black lexend text-4xl">Cart</h1>
    </div>
    @if (empty($viewData['itemsInfo']) || count($viewData['itemsInfo']) === 0)
        <p class=" w-full px-5 font-bold text-3xl rubik text-black">No Items Here</p>
    @else
        <div class="w-fit mx-auto px-5 grid grid-cols-2 gap-5 p-3 justify-center">
            @foreach ($viewData['itemsInfo'] as $item)
                <livewire:cart-items :item="$item" :key="$item->id" :sessionInfo="$sessionInfo"/>
            @endforeach 
        </div>
        <livewire:cart-total :sessionInfo="$sessionInfo"/>
    @endif
@endsection