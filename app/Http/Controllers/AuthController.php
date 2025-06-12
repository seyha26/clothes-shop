<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index() {
        // User::create([
        //     'name'=>'admin','email'=>'admin@gmail.com', 'password'=>'$2y$12$tzmGUv7E0pN6pnx9UdrJful4WIVQYuTxTVvyvXpZt2P5wMqLpLPky', 'role'=>'admin'
        // ]);
        // $user = User::find(1);
        // $user->role="admin";
        // $user->update();
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function login(Request $request) {
        $attrs = request()->validate([
            'email'=>['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        if(!Auth::attempt($attrs)) {
            throw ValidationException::withMessages([
                'email'=> 'Wrong username!'
            ]);
        }
        $request->session()->regenerate();
        if(Auth::user()->role != 'admin') {
            return redirect('/');
        }
        return redirect('/admin/dashboard');
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>['required', 'min:6'],
        ]);

        $request['password'] = Hash::make($request->password);

        $user = User::create($request->all());
        Auth::login($user);

        return redirect('/');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
