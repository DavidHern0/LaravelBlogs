@extends('layouts.app')

@section('title', __('Edit') . ': ' . $blog->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('blog.update', ['id' => $blog->id]) }}">
                            @csrf
                            @method('PUT')
                            <h1 class="mb-4">{{ __('Edit') . ': ' . $blog->title }}</h1>
                            <h3 class="card-subtitle mb-2 text-muted">{{ $blog->created_at->format('m/d/Y') }} -
                                {{ $blog->user->name }}</h3>

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}:</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title', $blog->title) }}" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">{{ __('Content') }}:</label>
                                <textarea name="content" id="content" class="ckeditor form-control" required>{{ old('content', $blog->content) }}</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="button button-show">{{ __('Save changes') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
