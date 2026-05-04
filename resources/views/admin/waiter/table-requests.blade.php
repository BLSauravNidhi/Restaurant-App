@extends('layouts.admin-layout')
@section('page-title')
    {{ 'Waiter - Table Requests' }}
@endsection

@section('page-content')
    <div class="w-full">
        <h1 class="text-3xl font-bold inter mb-14">Table Requests</h1>
        <div class=" flex flex-wrap gap-3">
            @foreach ($tableRequests as $request)
                <div class=" w-fit h-min-35 rounded-xl p-5 bg-blue-100 grid grid-cols-[120px_auto]">
                <div class=" h-full bg-blue-50 rounded-xl flex justify-center items-center fill-blue-400">
                    <svg viewBox="0 -960 960 960" class=" w-24 h-24"><path d="M160-160q-33 0-56.5-23.5T80-240v-440h80v440h280v80H160Zm120-560q-33 0-56.5-23.5T200-800q0-33 23.5-56.5T280-880q33 0 56.5 23.5T360-800q0 33-23.5 56.5T280-720ZM480-80v-200H280q-33 0-56.5-23.5T200-360v-236q0-35 24-59.5t58-24.5q19 0 35.5 8t28.5 22q45 49 96.5 89.5T560-520h54q-25-17-39.5-42.5T560-620h241q0 32-14.5 57.5T747-520h133v80H720v360h-80v-360h-80q-53 0-107-23t-93-55v138h120q33 0 56.5 23.5T560-300v220h-80Z"/></svg>
                </div>
                <div class=" p-3 flex flex-col gap-1">
                    <div class="info flex flex-col gap-0.5">
                        <h5 class=" font-bold lexend">Table No. {{ $request->tableinfo->table_number}}</h5>
                        <p class=" text-sm text-gray-500 inter italic">You have a pending requests for this table. 
                            <br> Requested at : {{ \Carbon\Carbon::parse($request->made_at)->format('g:i A') }}
                            <br> Date : {{ \Carbon\Carbon::parse($request->made_at)->format('F j, Y') }}
                        </p>
                    </div>
                    <div class="w-full flex flex-nowrap gap-2">
                        <form action="" method="get">
                            <input type="hidden" name="request-action" value="accept">
                            <button type="submit" class=" bg-blue-500 text-white px-2 py-1 rounded-md font-medium text-sm shadow-md">Accept</button>
                        </form>
                        <form action="" method="get">
                            <input type="hidden" name="request-action" value="reject">
                            <button type="submit" class=" bg-red-500 text-white px-2 py-1 rounded-md font-medium text-sm shadow-md">Reject</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection