<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('auth.login');
        } else if ($request->method() == 'POST') {
            $data = $request->only('email', 'password');
            $remember = $request->filled('remember');
            if (Auth::attempt($data, $remember)) {
                return redirect()->route('admin.index');
            } else {
                return back()->withErrors(['email' => 'Invalid credentials'])
                    ->withInput($request->only('email', 'remember'));
            }
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
