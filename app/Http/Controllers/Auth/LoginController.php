<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            return redirect()->route('home.index');
        } else {
            return view('auth.login.index');
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                return redirect()->route('home.index');
            }
            return back()->withErrors([
                'email' => __('The credentials are wrong.'),
            ]);
        } catch (\Exception $e) {
            Log::info(__('The login has failed.'), ["error" => $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        } catch (\Exception $e) {
            Log::info(__('The logout has failed.'), ["error" => $e->getMessage()]);
        }
    }
}
