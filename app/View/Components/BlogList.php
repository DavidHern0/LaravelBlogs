<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogList extends Component
{
    public $blogs;

    public function __construct($blogs)
    {
        $this->blogs = $blogs;
    }

    public function render()
    {
        return view('components.blog-list');
    }
}
