<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Clothe;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Http\Request;

use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session as StripeSession;

use function Laravel\Prompts\select;

class ClotheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favoriteProductIds = Auth::user() ? Auth::user()->favorite()->pluck('clothe_id')->toArray(): [];
        $clothes=Clothe::all();
        return view('clothe.index', compact('clothes', 'favoriteProductIds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Clothe $clothe)
    {
        return view('clothe.show', compact('clothe'));
    }

    public function add_cart(Request $request, Clothe $clothe) {
        $request->validate([
            'quantity'=>'required'
        ]);
        $existedClothe = Auth::user()->cart()->where('clothe_id', $clothe->id)->first();
        // $existedClothe = Auth::user()->cart()->where('clothe_id', $request->id)->first();
        if($existedClothe) {
            $existedClothe->quantity += $request->quantity;
            $existedClothe->save();
        } else {
            Auth::user()->cart()->create([
                'user_id'=> Auth::user()->id,
                'clothe_id'=> $clothe->id,
                'quantity'=> $request->quantity
            ]);
        }
        return redirect('/');
    }

    public function addFavorite(Clothe $clothe) {
        Favorite::create([
            'clothe_id'=>$clothe->id,
            'user_id'=> auth()->user()->id
        ]);
        return redirect('/');
    }

    public function removeFavorite(Clothe $clothe) {
        auth()->user()->favorite()->where('clothe_id', $clothe->id)->delete();
        return redirect('/');
    }


    public function cart() {
        $cart = Auth::user()->cart()->with('clothe')->get();
        return view('clothe.cart', compact('cart'));
    }

    public function update_quantity(Cart $cart) {
        try {
            //code...
            $cart->quantity = request()->input('quantity');
            $cart->save();
            return response(request()->input('quantity'));
        // dd(request()->quantity);

        } catch (\Throwable $th) {
            return response()->json([
            'error' => 'Failed to update quantity',
            'details' => $th->getMessage()
        ], 500);
        }
       
        // return redirect('/clothe/cart');
    }

    public function removeCart($id) {
        Cart::find($id)->delete();
        return redirect('/clothe/cart');
    }

    public function checkout() {
        // dd(request()->total_price);
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $clothes = auth()->user()->cart()->with('clothe')->get();
        $items = [];
        $totalPrice = 0;
        foreach ($clothes as $key => $clothe) {
            $totalPrice += $clothe->clothe->price;
            $items[] = ['price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => $clothe->clothe->price],
                    'unit_amount' => $clothe->clothe->price*100,
                ],
            'quantity' => $clothe->quantity,];
        }
        $session = $stripe->checkout->sessions->create([
            'line_items' => $items,
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8000/success'. '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://127.0.0.1:8000/clothe/cart',
        ]);

        return redirect($session->url);
    }

    public function success(Request $request) {
        $sessionId = $request->get('session_id');
        
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        
        $session = StripeSession::retrieve($sessionId);
        // dd($session->metadata->product_id);

        $this->completeOrder($session);
        
        return redirect('/');
    }

    public function completeOrder($session) {
        
        Order::create([
            'user_id'=> Auth::user()->id,
            'stripe_session_id'=> $session->id,
            'total_price'=>  $session->amount_total/100,
            'status'=> $session->status
        ]);

        

        $user = auth()->user();
        $cart = $user->cart->all();

        foreach ($cart as $key => $value) {
            $clothe = Clothe::find($value->clothe_id);
            if ($clothe) {   
                $clothe->quantity_in_stock-=$value->quantity;
                $clothe->save();
            }
        }
        if($user) {
            $user->cart()->delete();
        }
    }

    /**
     * Show the form for editing the specified resource.`
     */
    public function edit(Clothe $clothe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clothe $clothe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clothe $clothe)
    {
        //
    }

    public function dashboard() {
        $total_sale = Order::all()->sum('total_price');
        $total_orders = Order::all()->count();
        return view('admin.index', ['total_sale'=>$total_sale, 'total_orders' => $total_orders]);
    }

    public function admin_clothes() {
        $clothes = Clothe::all();
        return view('admin.clothe.index', compact('clothes'));
    }

    public function create_clothe() {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.clothe.create', compact('brands', 'categories'));
    }

     public function store_clothe(Request $request) {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'color'=>'required',
            'quantity_in_stock'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
        ]);
        $file_photo ='';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/products/', $filename);
            $file_photo = $filename;
        }

        Clothe::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'color'=>$request->color,
            'gender'=>$request->gender,
            'user_id'=>Auth::user()->id,
            'quantity_in_stock'=>$request->quantity_in_stock,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'photo'=>$file_photo,
        ]);
        return redirect('/admin/clothe');
    }

    public function edit_clothe(Clothe $clothe) {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.clothe.edit', compact('clothe', 'brands', 'categories'));
    }

    public function update_clothe(Clothe $clothe, Request $request) {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'color'=>'required',
            'quantity_in_stock'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
        ]);
        $file_photo ='';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/products/', $filename);
            $file_photo = $filename;
            
            $clothe->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'color'=>$request->color,
            'gender'=>$request->gender,
            'user_id'=>Auth::user()->id,
            'quantity_in_stock'=>$request->quantity_in_stock,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'photo'=>$file_photo,

            ]);
            return redirect('/admin/clothe');
        }
        $clothe->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'color'=>$request->color,
            'gender'=>$request->gender,
            'user_id'=>Auth::user()->id,
            'quantity_in_stock'=>$request->quantity_in_stock,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
        ]);
        return redirect('/admin/clothe');
    }

    public function destroy_clothe(Clothe $clothe) {
        $clothe->delete();
        return redirect('/admin/clothe');
    }

    public function create_brand() {
        return view('admin.brand.create');
    }

    public function delete_brand(Brand $brand) {
        $brand->delete();
        return redirect('/admin/brand');
    }

    public function delete_category(Category $category) {
        $category->delete();
        return redirect('/admin/category');
    }

     public function store_brand(Request $request) {
        $request->validate(['name'=>'required']);
        Brand::create($request->all());
        return redirect('/admin/brand');
    }

    public function store_category(Request $request) {
        $request->validate(['name'=>'required']);
        Category::create($request->all());
        return redirect('/admin/category');
    }

    public function create_category() {
        return view('admin.category.create');
    }

    public function admin_category() {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function admin_brand() {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    
}
