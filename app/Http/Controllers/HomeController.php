<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            $blogs = Blog::where('user_id', auth()->id())->latest()->paginate(5);
            return view('home.index', compact('blogs'));
        } else {
            return redirect()->route('login.index');
        }
    }
}
