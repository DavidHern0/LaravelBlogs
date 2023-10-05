<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            return redirect()->route('home.index');
        } else {
            return view('auth.register.index');
        }
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6|same:password_confirmation',
                'password_confirmation' => 'required|string|min:6|same:password',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = User::create([
                'name' => $validator->validated()['name'],
                'email' => $validator->validated()['email'],
                'password' => Hash::make($validator->validated()['password']),
            ]);

            return redirect()->route('login.index');
        } catch (\Exception $e) {
            Log::info(__('The registration failed.'), ["error" => $e->getMessage()]);
        }
    }
}
