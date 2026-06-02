@extends('layouts.menu-layout')

@section('page-title')
    {{ "Menu"}}
@endsection

@push('page-scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script defer>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.closest('.cart-item').getAttribute('item-id');

                console.log(itemId);

                fetch("{{ route('cart.store', ['tableNum' => $sessionInfo->table_number, 'token' => $sessionInfo->session_token])}}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        item_id: itemId,
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.classList.remove('add-to-cart');
                        this.innerHTML = '<svg height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>';
                        this.parentNode.classList.add('bg-lime-600');
                    }
                })
                .catch(error => console.log('Error:', error));
            });
        });
    </script>
@endpush

@section('app-content')
    {{-- categories starting --}}
    <div class="w-full px-4 overflow-hidden">
        <h3 class=" font-medium lexend text-xl">Delicios foods here</h3>
        <div class=" flex flex-row flex-nowrap items-center overflow-x-scroll gap-3 py-6">
            {{-- Top food list start --}}
            @foreach ($viewData['categories'] as $category)
                <a href="" class=" w-26 h-26 bg-gray-200 text-center flex flex-col justify-center items-center shrink-0 gap-2 rounded-2xl">
                    <img src="{{ $category->image}}" class="w-10 h-10 rounded-4xl mix-blend-multiply brightness-120 bg-gray-200">
                    <p class="font-medium text-black lexend">{{ $category->name }}</p>
                </a>
            @endforeach
            </div>
            {{-- Top food list end --}}
        </div>
    </div>
    {{-- categories ending --}}
    {{-- page start --}}
    <section class="px-3 pb-8">
        <img src="https://img.magnific.com/free-psd/delicious-burger-food-menu-web-banner-template_106176-1436.jpg?semt=ais_hybrid&w=740&q=80" class="w-full max-h-50 rounded-4xl bg-lime-600 aspect-video object-cover object-center"></img>
    </section>
    {{-- page end  --}}
    
    {{-- Search Bar  --}}
    @include('components.food-search-bar')

    <section class="px-3 pb-8 flex flex-col gap-6">
        {{-- Filter items start --}}
        <div class="w-full overflow-x-scroll overflow-y-hidden flex flex-nowrap items-center gap-2">
            <p class="px-2 py-0 5 bg-lime-600 text-white rounded-sm font-medium shadow-2xs whitespace-nowrap">Filter</p>
            <p class="px-2 py-0 5 bg-gray-300 text-gray-800 rounded-sm font-medium shadow-2xs whitespace-nowrap">All Categories</p>
        </div>
        {{-- Filter items end --}}

        <div class="w-full flex gap-3 flex-wrap justify-center">
            
            {{-- Items Start  --}}
            @foreach ($viewData['menuItems'] as $item)
                <div class="w-90 h-38 shrink-0 rounded-2xl bg-gray-200 overflow-hidden relative grid grid-cols-[35%_auto_25%]">
                <span class=" absolute top-0 left-0 bg-black text-white rounded-br-2xl px-2 py-1.5 text-xs font-medium rubik">34% off</span>
                <div class="flex justify-end items-center">
                    <img src="{{ $item->image}}" alt="" class=" scale-75 w-38 mix-blend-multiply aspect-square">
                </div>
                <div class="details py-3 flex flex-col gap-0.5">
                    <h2 class="text-black font-bold inter capitalize">{{ $item->item_name}}</h2>
                    <p class="text-sm text-gray-600">Offer vailid today only</p>
                    <span class=" w-fit bg-orange-600 px-2 py-0.5 rounded-md font-medium text-sm text-white rubik">Offer</span>
                    <p class=" font-bold ">₹{{ $item->price}}</p>
                </div>
                <div class=" flex flex-col items-end justify-between p-3">
                    <svg viewBox="0 0 24 24" class=" w-7 h-7 bg-white fill-gray-500 rounded-3xl p-1">
                        <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"/>
                    </svg>
                            @php
                                // Pluck all item IDs into an array for a fast, clean check
                                $cartItemIds = $viewData['cartItems'] ? $viewData['cartItems']->GetItems->pluck('menu_item_id')->toArray() : [];
                            @endphp

                            @if (in_array($item->id, $cartItemIds))
                                <!-- Checkmark Icon (Item is in cart) -->
                                <span item-id="{{ $item->id}}" class=" cart-item w-fit h-fit flex flex-nowrap justify-center items-center text-center bg-lime-600 text-white rounded-2xl font-bold overflow-hidden">
                                    <button class="">
                                        <svg height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff">
                                            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/>
                                        </svg>
                                    </button>
                                </span>
                            @else
                                <!-- Plus Icon (Item is NOT in cart) -->
                                <span item-id="{{ $item->id}}" class=" cart-item w-fit h-fit flex flex-nowrap justify-center items-center text-cente fill-black rounded-2xl font-bold overflow-hidden">
                                    <button class=" add-to-cart">
                                        <svg height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                                            <path d="M440-120v-320H120v-80h320v-320h80v320h320v80H520v320h-80Z"/>
                                        </svg>
                                    </button>
                                </span>
                            @endif
                </div>
            </div>
            @endforeach
            {{-- Items End  --}}
        </div>
    </section>
@endsection