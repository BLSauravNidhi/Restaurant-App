@extends('layouts.admin-layout')
@section('page-title')
    {{ 'Admin' }}
@endsection

@section('page-content')
    <div class="w-full rounded-xl min-h-50 bg-gray-200"></div>
    <div id="widgets" class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 justify-between">

        <div class="flex grow-0 shrink basis-62 h-50 flex-col flex-nowrap overflow-hidden p-5 gap-2 rounded-xl border border-gray-200 bg-white shadow-xl">
            <div class="w-full h-2/4 grid grid-cols-[48px_auto] gap-4 items-center bg-white">
                <i class=" bg-gray-200 w-10 h-10 rounded-xl"></i>
                <h3 class=" font-medium text-sm lexend text-blue-500">Customer</h3>
            </div>
            <div class="w-full h-full bg-gray-200 rounded-md"></div>
        </div>
        <div class="flex grow-0 shrink basis-62 h-50 flex-col flex-nowrap overflow-hidden p-5 gap-2 rounded-xl border border-gray-200 bg-white shadow-xl">
            <div class="w-full h-2/4 grid grid-cols-[48px_auto] gap-4 items-center bg-white">
                <i class=" bg-gray-200 w-10 h-10 rounded-xl"></i>
                <h3 class=" font-medium text-sm lexend text-yellow-500">Bills</h3>
            </div>
            <div class="w-full h-full bg-gray-200 rounded-md"></div>
        </div>
        <div class="flex grow-0 shrink basis-62 h-50 flex-col flex-nowrap overflow-hidden p-5 gap-2 rounded-xl border border-gray-200 bg-white shadow-xl">
            <div class="w-full h-2/4 grid grid-cols-[48px_auto] gap-4 items-center bg-white">
                <i class=" bg-gray-200 w-10 h-10 rounded-xl"></i>
                <h3 class=" font-medium text-sm lexend text-emerald-400">Ammount</h3>
            </div>
            <div class="w-full h-full bg-gray-200 rounded-md"></div>
        </div>
        <div class="flex grow-0 shrink basis-62 h-50 flex-col flex-nowrap overflow-hidden p-5 gap-2 rounded-xl border border-gray-200 bg-white shadow-xl">
            <div class="w-full h-2/4 grid grid-cols-[48px_auto] gap-4 items-center bg-white">
                <i class=" bg-gray-200 w-10 h-10 rounded-xl"></i>
                <h3 class=" font-medium text-sm lexend text-red-400">Customer on table</h3>
            </div>
            <div class="w-full h-full bg-gray-200 rounded-md"></div>
        </div>

        <div class=" flex col-span-1 md:col-span-2 xl:col-span-3 h-50 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-xl"></div>

        <div class="flex grow-0 shrink basis- h-50 flex-col flex-nowrap overflow-hidden p-5 gap-2 rounded-xl border border-gray-200 bg-white shadow-xl">
            
        </div>
    </div>
@endsection