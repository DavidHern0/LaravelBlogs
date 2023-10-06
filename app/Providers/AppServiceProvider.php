<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Blog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $randomBlog = Blog::inRandomOrder()->first();
        if ($randomBlog) {
            View::share('randomUrl', $randomBlog->url);
        } else {
            View::share('randomUrl', null);
        }
    }
}
