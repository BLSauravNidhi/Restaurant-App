@extends('layouts.admin-layout')
@section('page-title')
    {{ 'Waiter - Table Status' }}
@endsection

@section('page-content')
    <div class="w-full">
        <h1 class="text-3xl font-bold inter">Tables</h1>
        <div class="w-full flex flex-wrap p-5 gap-4">

            @foreach ($restaurentTables as $table)
                <div class="req-card flex flex-col gap-2 w-65 h-45 p-2 bg-blue-100 rounded-3xl shadow-sm">
                    <div class="status w-full h-fit flex flex-nowrap items-center px-2">
                        @switch($table->status)
                            @case('occupied')
                                <h5 class="ml-auto w-14.75 flex items-center justify-center flex-nowrap bg-orange-600 px-1.5 py-0.5 font-medium text-[10px] text-white rounded-md">Occupied</h5>
                                @break
                            @case('available')
                                <h5 class="ml-auto w-14.75 flex items-center justify-center flex-nowrap bg-emerald-600 px-1.5 py-0.5 font-medium text-[10px] text-white rounded-md">Available</h5>
                                @break
                        @endswitch
                    </div>
                    <div class="table-info w-full h-full p-2 bg-white rounded-3xl border border-gray-200 shadow-md">
                        <div class="w-full h-fit flex flex-nowrap items-center gap-3 fill-emerald-500">
                            <svg height="24px" viewBox="0 -960 960 960" width="24px" ><path d="m240-160 60-150q9-23 29-36.5t45-13.5h66v-161q-153-5-256.5-45T80-660q0-58 117-99t283-41q167 0 283.5 41T880-660q0 54-103.5 94T520-521v161h66q24 0 44.5 13.5T660-310l60 150h-80l-48-120H368l-48 120h-80Zm240-440q97 0 183-17t126-43q-40-26-126-43t-183-17q-97 0-183 17t-126 43q40 26 126 43t183 17Zm0-60Z"/></svg>
                            <h4 class="font-medium lexend text-md text-black">Table {{ $table->table_number}}</h4>
                        </div>
                    </div>
                    <div class="w-full h-fit flex justify-center items-center">
                        <h4 class="text-blue-300 font-medium text-md lexend">
                            @if ($table->tblsessions->first())
                                <h4 class="text-blue-400 font-medium text-md lexend">Ends at {{ \Carbon\Carbon::parse($table->tblsessions->first()->expires_at)->format('g:i A')}}</h4>
                            @else
                                <h4 class="text-blue-300 font-medium text-md lexend">Not started yet</h4>
                            @endif
                        </h4>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection