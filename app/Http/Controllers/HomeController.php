<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {  
        try {
            return view('home.index');
        } catch(\Exception $e) {
            Log::info('The home page failed to load.', ["error" => $e->getMessage()]);
        }
    }
}
