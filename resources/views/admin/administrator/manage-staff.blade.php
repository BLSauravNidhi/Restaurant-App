@extends('layouts.admin-layout')

@section('page-title')
    {{ 'Manage Staff' }}
@endsection

@section('page-content')
    <div class="w-full flex justify-end items-center flex-nowrap px-5 py-1">
        <h2 class=" mr-auto montserrat font-bold text-3xl text-emerald-500 text-shadow-sm">Employees</h2>
        <button id="openAddWorkerModalBtn" class=" bg-emerald-600 text-white lexend py-2 px-5 rounded-md shadow-xl"> Add + </button>
    </div>
    <table class=" shadow-sm text-black" id="staffTable">
            <tbody class=" text-center p-5 inter text-sm">
                <tr class=" bg-blue-500 text-white inter">
                    <th>Sl No.</th>
                    <th>Staff Name</th>
                    <th>email</th>
                    <th>Job</th>
                    <th>Actions</th>
                </tr>
                @foreach ($workers as $worker)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$worker->admin_name}}</td>
                        <td>{{$worker->email}}</td>
                        <td><span class=" 
                            {{ ($worker->role=='waiter' )? 'text-emerald-600 bg-green-100' : '' }}
                            {{ ($worker->role=='kitchen' )? 'text-yellow-600 bg-yellow-100' : '' }}
                             
                            rounded-xl px-3 py-0.5 font-medium capitalize shadow">{{$worker->role}}</span></td>
                        <td>
                            <a href="" class=" py-2 px-5 bg-emerald-600 shadow-md text-white rounded-md lexend">Edit</a>
                            
                            <a href="" class=" py-2 px-5 bg-red-600 shadow-md text-white rounded-md lexend">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.administrator.modals.create-staff')
@endsection