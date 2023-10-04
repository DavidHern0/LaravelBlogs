<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function create()
    {
        return view('blog.create');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->user_id !== auth()->id()) {
            abort(403, 'You do not have permission to edit this blog post.');
        }
        return view('blog.edit', compact('blog'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blog.show', compact('blog'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required|max:1000',
            ]);
            LOG::error($request);
            $blog = Blog::create([
                'user_id' => auth()->id(),
                'title' => $validatedData['title'],
                'content' => $validatedData['content']
            ]);        

            return redirect()->route('blog.show', ['id' => $blog->id])->with('success', 'Blog created successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to create a blog post.', ["error" => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $blog = Blog::findOrFail($id);
        if ($blog->user_id !== auth()->id()) {
            abort(403, 'You do not have permission to edit this blog post.');
        }
    
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];
        $blog->save();
    
        return redirect()->route('blog.show', ['id' => $blog->id])->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect(route('home.index'))->with('success', 'Blog deleted successfully.');
    }
}