<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class LandingController extends Controller
{
    public function index()
    {
        try {
            $blogs = Blog::latest()->paginate(5);
            return view('landing.index', compact('blogs'));
        } catch (\Exception $e) {
            Log::info('The home page failed to load.', ["error" => $e->getMessage()]);
        }
    }
}
