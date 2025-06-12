@extends('layouts.dashboard')
@section('title', 'Clothes')

<?php
    use App\Models\Category;
    use App\Models\Brand;
    use App\Models\User;
?>
@section('content')
<div class="mb-[20px]">
    <a href="/admin/clothes/create" class="bg-teal-800 text-white inline-block px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-800 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
        Add Clothe
</a>
</div>
<table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                price
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                description	
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                color
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                gender
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                quantity_in_stock
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                user_id
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                category_id
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                brand_id
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                photo
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($clothes as $clothe)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$clothe->id}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$clothe->name}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$clothe->price}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$clothe->description}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$clothe->color}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$clothe->gender}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm  {{$clothe->quantity_in_stock == 0? 'text-red-700':'text-gray-500'}}">
                {{$clothe->quantity_in_stock == 0?"Out stock":$clothe->quantity_in_stock}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{User::find($clothe->user_id)->name}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{Category::find($clothe->category_id)->name}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{Brand::find($clothe->brand_id)->name}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <img class="w-[150px]" src="{{asset('uploads/products/'. $clothe->photo)}}" alt="">
            </td>
            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                <a href="/admin/clothe/{{$clothe->id}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <a href="/admin/clothe/delete/{{$clothe->id}}" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
            </td>
        </tr>
         @endforeach
    </tbody>
</table>
@endsection