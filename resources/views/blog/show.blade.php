@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 px-0">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body py-5">
                        <h1 class="card-title">{{ $blog->title }}</h1>
                        <h3 class="card-subtitle mb-2 text-muted">{{ $blog->created_at->format('m/d/Y') }} -
                            {{ $blog->user->name }}</h3>
                        <section class="blog-content">
                            {!! $blog->content !!}
                        </section>
                    </div>
                    @if ($blog->user_id === auth()->id())
                        <div class="card-footer">
                            <a href="{{ route('blog.edit', ['id' => $blog->id]) }}"
                                class="button button-show">{{ __('Edit') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
