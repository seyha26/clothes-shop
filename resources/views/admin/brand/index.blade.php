@extends('layouts.dashboard')

@section('title', 'Brands')

@section('content')
<div class="mb-3">
    <a href="/admin/brand/create" class="bg-indigo-800 text-white inline-block px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-800 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
        Add Brand
</a>
</div>
<table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="w-[500px] px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID
            </th>
            <th scope="col" class="w-[900px] px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($brands as $brand)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$brand->id}}
            </td>
             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$brand->name}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                <a href="/admin/brand/{{$brand->id}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <a href="/admin/brand/delete/{{$brand->id}}" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection