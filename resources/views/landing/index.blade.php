@extends('layouts.app')

@section('title', __('LaravelBlogs'))

@section('content')
<div class="container">
    <h1>{{ __('Blogs') }}</h1>

    @foreach ($blogs as $blog)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $blog->title }}</h5>
            <h6 class="card-title text-muted">{{$blog->user->name}} - {{ $blog->created_at->format('m/d/Y') }}</h6>
            <p class="card-text">{{ substr($blog->content, 0, 200) }}{{ strlen($blog->content) > 200 ? '...' : '' }}</p>
            <div class="d-flex">
                <a href="{{ route('blog.show', ['id' => $blog->id]) }}" class="btn btn-primary">{{ __('Read more') }}</a>
                @if($blog->user_id === auth()->id())
                    <a href="{{ route('blog.edit', ['id' => $blog->id]) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                    <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach

    {{ $blogs->links() }}
</div>
@endsection
