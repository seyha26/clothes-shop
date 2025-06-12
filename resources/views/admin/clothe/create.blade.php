@extends('layouts.dashboard')
@section('title', 'Add Cloth')
@section('content')
<div class="relative m-10">

    <div class="flex items-start justify-between p-5 border-b rounded-t">
        <h3 class="text-xl font-semibold">
            Add clothe
        </h3>
        
    </div>
<form action="/admin/clothe/store" method="post" enctype="multipart/form-data">
    <div class="p-6 space-y-6">
     
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Product Name</label>
                    <input type="text" name="name" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Enter product name" required="">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Price</label>
                    <input type="text" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Enter price" required="">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="color" class="text-sm font-medium text-gray-900 block mb-2">Color</label>
                    <input type="text" name="color" id="color" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Enter color" required="">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="gender" class="text-sm font-medium text-gray-900 block mb-2">Gender</label>
                    <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="quantity_in_stock" class="text-sm font-medium text-gray-900 block mb-2">Qauntity</label>
                    <input type="number" name="quantity_in_stock" id="quantity_in_stock" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Enter Qauntity" required="">
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Brand</label>
                    <select id="brand" name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option>Choose a brand</option>
                    @foreach($brands as $key => $brand)
                    <option {{ $key == 0 ? 'selected' : '' }} value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Category</label>
                    <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a category</option>
                     @foreach($categories as $category)
                    <option {{ $key == 0 ? 'selected' : '' }}  value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                </div>
                
                <div class="col-span-full">
                    <label for="product-details" class="text-sm font-medium text-gray-900 block mb-2">Product Details</label>
                    <textarea id="product-details" name="description" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4" placeholder="Description"></textarea>
                </div>
                <div class="rounded-md border border-indigo-500 bg-gray-50 p-4 shadow-md w-36">
                    <label for="upload" class="flex flex-col items-center gap-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-indigo-500" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="text-gray-600 font-medium">Upload image</span>
                    </label>
                    <input id="upload" type="file" name="photo" class="hidden" />
                </div>
            </div>
        
    </div>

    
    <div class="p-6 border-t border-gray-200 rounded-b">
        <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save all</button>
    </div>
</form>
</div>
@endsection