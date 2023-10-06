<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    public function getBlogUrl($title) {
        $sanitizedTitle = Str::slug($title);
        $code = uniqid();
        $url = $sanitizedTitle . '-' . $code;

        return $url;
    }

    public function create()
    {
        if (auth()->user()) {
            return view('blog.create');
        } else {
            return redirect()->route('login.index');
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->user_id !== auth()->id()) {
            abort(403, __('You do not have permission to edit this blog post.'));
        }
        return view('blog.edit', compact('blog'));
    }

    public function show($blog_url)
    {
        $blog = Blog::where('url', $blog_url)->first();
    
        if ($blog) {
            if (auth()->check()) {
                $user = User::find(auth()->id());
                if (!$user->viewedBlogs->contains($blog)) {
                    $user->viewedBlogs()->attach($blog->id);
                }
            }
            return view('blog.show', compact('blog'));
        } else {
            abort(404, __('Blog not found.'));
        }
    }
    

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required|max:1000',
            ]);
            
            $blog = Blog::create([
                'user_id' => auth()->id(),
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'url' => $this->getBlogUrl($validatedData['title'])
            ]);

            return redirect()->route('blog.show', ['blog_url' => $blog->url])->with('success', __('Blog created successfully.'));
        } catch (\Exception $e) {
            Log::error(__('Failed to create a blog post.'), ["error" => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
            ]);
            $blog = Blog::findOrFail($id);
            if ($blog->user_id !== auth()->id()) {
                abort(403, __('You do not have permission to edit this blog post.'));
            }

            $blog->title = $validatedData['title'];
            $blog->content = $validatedData['content'];
            $blog->url = $this->getBlogUrl($validatedData['title']);
            $blog->save();

            return redirect()->route('blog.show', ['id' => $blog->id])->with('success', __('Blog updated successfully.'));
        } catch (\Exception $e) {
            Log::error(__('Failed to update a blog post.'), ["error" => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back()->with('success', __('Blog deleted successfully.'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $blogs = Blog::where('title', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(5);
        return view('blog.search', ['blogs' => $blogs, 'search' => $search]);
    }
}
