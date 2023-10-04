@extends('layouts.home')

@section('title', __('My Blogs'))

@section('content')
<div class="container">
    <h1>{{ __('My Blogs') }}</h1>
    <h3><a href="{{ route('blog.create') }}">{{ __('Create New Blog') }}</a></h3>
    @if($blogs->isEmpty())
        <p>{{ __('There are no blogs') }}</p>
    @else
        @foreach ($blogs as $blog)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $blog->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$blog->user->name}} - {{ $blog->created_at->format('m/d/Y') }}</h6>
                <p class="card-text">{{ substr($blog->content, 0, 200) }}{{ strlen($blog->content) > 200 ? '...' : '' }}</p>
                <div class="d-flex">
                    <a href="{{ route('blog.show', ['id' => $blog->id]) }}" class="btn btn-primary">{{ __('Read More') }}</a>
                    <a href="{{ route('blog.edit', ['id' => $blog->id]) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                    <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        {{ $blogs->links() }}
    @endif
</div>
@endsection
