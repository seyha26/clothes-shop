@extends("layouts.dashboard")

@section('title', 'Dashboard')

@section('content')
<?php

use App\Models\Clothe;
use App\Models\User;

?>
 <div class="grid grid-cols-1 gap-4 px-4 mt-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:px-8">
    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="px-6 bg-green-400 h-full flex items-center">
            <i class="fa-solid fa-circle-user text-3xl text-white"></i>
        </div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Users</h3>
            <p class="text-3xl">{{User::count()}}</p>
        </div>
    </div>
    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-blue-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                </path>
            </svg></div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Clothes</h3>
            <p class="text-3xl">{{Clothe::count()}}</p>
        </div>
    </div>
    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="px-6 bg-indigo-400 h-full flex items-center">
            <i class="fa-solid fa-cart-shopping text-3xl text-white"></i>
        </div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Orders</h3>
            <p class="text-3xl">{{$total_orders}}</p>
        </div>
    </div>
    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="px-6 bg-red-400 h-full flex items-center">
            <i class="fa-solid fa-dollar-sign text-3xl text-white"></i>
        </div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Sale</h3>
            <p class="text-3xl">{{$total_sale}}</p>
        </div>
    </div>
</div>
@endsection