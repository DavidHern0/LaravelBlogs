@extends('layouts.home')

@section('title', 'Blog_edit')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('blog.update', ['id' => $blog->id]) }}">
        @csrf
        @method('PUT')
        <h1 class="mb-4">{{ __('Blog_edit') }}</h1>

        <div class="form-group">
            <label for="title">{{ __('Title') }}:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">{{ __('Content') }}:</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $blog->content) }}</textarea>
            @error('content')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
