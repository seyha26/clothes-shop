<?php

use App\Models\Clothe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClotheController;

Route::get('/', function () {
    $favoriteProductIds = Auth::user() ? Auth::user()->favorite()->pluck('clothe_id')->toArray(): [];
    $clothes_latest = Clothe::latest()->take(4)->get();
    $clothes = Clothe::take(4)->get();
    return view('home', compact('clothes', 'clothes_latest', 'favoriteProductIds'));
});
Route::post('/clothe/add_cart/{clothe}', [ClotheController::class, 'add_cart']);

Route::get('/login', [AuthController::class,'index']);
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout']);
Route::get('/register', [AuthController::class,'register']);
Route::post('/register/store', [AuthController::class,'store']);


Route::get('/clothes',[ClotheController::class, 'index'])->middleware('auth');
Route::get('/clothe/show/{clothe}',[ClotheController::class, 'show'])->middleware('auth');
Route::get('/clothe/remove_cart/{id}',[ClotheController::class, 'removeCart'])->middleware('auth');
Route::get('/add-favorite/{clothe}',[ClotheController::class, 'addFavorite'])->middleware('auth');
Route::get('/remove-favorite/{clothe}',[ClotheController::class, 'removeFavorite'])->middleware('auth');
Route::get('/clothe/cart', [ClotheController::class, 'cart'])->name('cloth.cart')->middleware('auth');
Route::post('/cart/update-quantity/{cart}', [ClotheController::class, 'update_quantity'])->middleware('auth');
Route::post('/clothe/checkout', [ClotheController::class, 'checkout'])->name('cloth.checkout');
Route::get('/success', [ClotheController::class, 'success']);
Route::get('/cancel', function(){return view('checkout.cancel');});

Route::get('/admin/dashboard', [ClotheController::class, 'dashboard'])->middleware('role');
Route::get('/admin/clothe', [ClotheController::class, 'admin_clothes'])->middleware('role');
Route::get('/admin/clothes/create', [ClotheController::class, 'create_clothe'])->middleware('role');
Route::get('/admin/category', [ClotheController::class, 'admin_category'])->middleware('role');
Route::get('/admin/category/create', [ClotheController::class, 'create_category'])->middleware('role');
Route::get('/admin/brand/create', [ClotheController::class, 'create_brand'])->middleware('role');
Route::get('/admin/brand/delete/{brand}', [ClotheController::class, 'delete_brand'])->middleware('role');
Route::get('/admin/category/delete/{category}', [ClotheController::class, 'delete_category'])->middleware('role');

Route::post('/admin/brand/store', [ClotheController::class, 'store_brand'])->middleware('role');
Route::post('/admin/clothe/store', [ClotheController::class, 'store_clothe'])->middleware('role');
Route::get('/admin/clothe/{clothe}/edit', [ClotheController::class, 'edit_clothe'])->middleware('role');
Route::put('/admin/clothe/update/{clothe}', [ClotheController::class, 'update_clothe'])->middleware('role');
Route::get('/admin/clothe/delete/{clothe}', [ClotheController::class, 'destroy_clothe'])->middleware('role');
Route::post('/admin/category/store', [ClotheController::class, 'store_category'])->middleware('role');
Route::get('/admin/brand', [ClotheController::class, 'admin_brand'])->middleware('role');
