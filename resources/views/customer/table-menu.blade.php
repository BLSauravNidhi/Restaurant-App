@extends('layouts.menu-layout')

@section('page-title')
    {{ "Menu"}}
@endsection

@section('app-content')
    {{-- categories starting --}}
    <div class="w-full px-4 overflow-hidden">
        <h3 class=" font-medium lexend text-xl">Delicios foods here</h3>
        <div class=" flex flex-row flex-nowrap items-center overflow-x-scroll gap-3 py-6">
            {{-- Top food list start --}}
            <div class=" w-26 h-26 bg-gray-200 text-center flex flex-col justify-center items-center shrink-0 gap-2 rounded-2xl">
                <img src="" class="w-10 h-10 rounded-4xl bg-gray-200">
                <p class="font-medium text-black lexend">Veg</p>
            </div>
            <div class=" w-26 h-26 bg-gray-200 text-center flex flex-col justify-center items-center shrink-0 gap-2 rounded-2xl">
                <img src="" class="w-10 h-10 rounded-4xl bg-gray-200">
                <p class="font-medium text-black lexend">Non Veg</p>
            </div>
            <div class=" w-26 h-26 bg-gray-200 text-center flex flex-col justify-center items-center shrink-0 gap-2 rounded-2xl">
                <img src="" class="w-10 h-10 rounded-4xl bg-gray-200">
                <p class="font-medium text-black lexend">Fast Food</p>
            </div>
            <div class=" w-26 h-26 bg-gray-200 text-center flex flex-col justify-center items-center shrink-0 gap-2 rounded-2xl">
                <img src="" class="w-10 h-10 rounded-4xl bg-gray-200">
                <p class="font-medium text-black lexend">Drinks</p>
            </div>
            {{-- Top food list end --}}
        </div>
    </div>
    {{-- categories ending --}}
    {{-- page start --}}
    <section class="px-3 pb-8">
        <div class="w-full min-h-50 rounded-4xl bg-emerald-500"></div>
    </section>
    {{-- page end  --}}
    
    {{-- Search Bar  --}}
    @include('components.food-search-bar')

    <section class="px-3 pb-8 flex flex-col gap-6">
        {{-- Filter items start --}}
        <div class="w-full overflow-x-scroll overflow-y-hidden flex flex-nowrap items-center gap-2">
            <p class="px-2 py-0 5 bg-emerald-500 text-white rounded-sm font-medium shadow-2xs whitespace-nowrap">Filter</p>
            <p class="px-2 py-0 5 bg-gray-300 text-gray-800 rounded-sm font-medium shadow-2xs whitespace-nowrap">All Categories</p>
        </div>
        {{-- Filter items end --}}

        <div class="w-full flex gap-3 flex-wrap justify-center">
            
            {{-- Items Start  --}}
            <div class="w-90 h-32 shrink- rounded-2xl bg-gray-200 overflow-hidden relative grid grid-cols-[35%_auto_25%]">
                <span class=" absolute top-0 left-0 bg-black text-white rounded-br-2xl px-2 py-1.5 text-xs font-medium rubik">34% off</span>
                <div class="flex justify-end items-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTthMItWzAAXDjKOuUNiN3b1me3pSweyIx7fA&s" alt="" class=" scale-75 w-38 mix-blend-multiply aspect-square">
                </div>
                <div class="details py-3 flex flex-col gap-0.5">
                    <h2 class="text-black font-bold inter capitalize">Cheese Burger</h2>
                    <p class="text-sm text-gray-600">Offer vailid today only</p>
                    <span class=" w-fit bg-orange-600 px-2 py-0.5 rounded-md font-medium text-sm text-white rubik">Offer</span>
                    <p class=" font-bold ">₹148</p>
                </div>
                <div class=" fill-black flex flex-col items-end justify-between p-3">
                    <svg viewBox="0 -960 960 960" class=" w-7 h-7 bg-white rounded-3xl p-1"><path d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z"/></svg>

                    <span cart-id="cart-id" item-id="1" class=" cart-item w-full h-fit grid grid-cols-3 justify-center items-center text-center bg-white rounded-2xl font-bold overflow-hidden">
                        <button data-action="decreament" class=" btn-update">-</button>
                        <span class=" quantity">1</span>
                        <button data-action="increament" class=" btn-update">+</button>
                    </span>
                </div>
            </div>

            <div class="w-90 h-32 shrink- rounded-2xl bg-gray-200 overflow-hidden relative grid grid-cols-[35%_auto_25%]">
                <span class=" absolute top-0 left-0 bg-black text-white rounded-br-2xl px-2 py-1.5 text-xs font-medium rubik">34% off</span>
                <div class="flex justify-end items-center">
                    <img src="https://img.magnific.com/free-psd/top-view-delicious-pizza_23-2151868964.jpg?semt=ais_hybrid&w=740&q=80" alt="" class=" scale-75 w-38 mix-blend-multiply aspect-square">
                </div>
                <div class="details py-3 flex flex-col gap-0.5">
                    <h2 class="text-black font-bold inter capitalize">Pizza Hut Italian</h2>
                    <p class="text-sm text-gray-600">Offer vailid today only</p>
                    <span class=" w-fit bg-orange-600 px-2 py-0.5 rounded-md font-medium text-sm text-white rubik">Offer</span>
                    <p class=" font-bold ">₹239</p>
                </div>
                <div class=" fill-black flex flex-col items-end justify-between p-3">
                    <svg viewBox="0 -960 960 960" class=" w-7 h-7 bg-white rounded-3xl p-1"><path d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z"/></svg>

                    <span class=" w-full h-fit grid grid-cols-3 justify-center items-center text-center bg-white rounded-2xl font-bold overflow-hidden">
                        <button data-action="decreament">-</button>
                        <span class="quantity">1</span>
                        <button data-action="increament">+</button>
                    </span>
                </div>
            </div>

            <div class="w-90 h-32 shrink- rounded-2xl bg-gray-200 overflow-hidden relative grid grid-cols-[35%_auto_25%]">
                <span class=" absolute top-0 left-0 bg-black text-white rounded-br-2xl px-2 py-1.5 text-xs font-medium rubik">34% off</span>
                <div class="flex justify-end items-center">
                    <img src="https://static.vecteezy.com/system/resources/previews/052/644/653/non_2x/delicious-buttered-lobster-platter-for-gourmet-dining-on-transparent-background-png.png" alt="" class=" scale-75 w-38 mix-blend-multiply aspect-square">
                </div>
                <div class="details py-3 flex flex-col gap-0.5">
                    <h2 class="text-black font-bold inter capitalize">Lobster</h2>
                    <p class="text-sm text-gray-600">Offer vailid today only</p>
                    <span class=" w-fit bg-orange-600 px-2 py-0.5 rounded-md font-medium text-sm text-white rubik">Offer</span>
                    <p class=" font-bold ">₹899</p>
                </div>
                <div class=" fill-black flex flex-col items-end justify-between p-3">
                    <svg viewBox="0 -960 960 960" class=" w-7 h-7 bg-white rounded-3xl p-1"><path d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z"/></svg>

                    <span class=" w-full h-fit grid grid-cols-3 justify-center items-center text-center bg-white rounded-2xl font-bold overflow-hidden">
                        <button data-action="decreament">-</button>
                        <span class="quantity">2</span>
                        <button data-action="increament">+</button>
                    </span>
                </div>
            </div>

            {{-- Items End  --}}
        </div>

    </section>
    <div class="w-full h-screen"></div>
@endsection