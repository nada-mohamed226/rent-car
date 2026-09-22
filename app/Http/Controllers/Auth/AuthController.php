<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $is_login = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if (!$is_login) {
            return redirect()->route('login')->with('msg', 'invalid email or password');
        }

        return redirect()->route('admin.home');
    }

    public function handleRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        auth()->login($user);

        return redirect()->route('admin.home');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}