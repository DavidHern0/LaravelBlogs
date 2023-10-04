@extends('layouts.app')

@section('title', $blog->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h1>{{ $blog->title }}</h1>
            <h3>{{ $blog->created_at->format('m/d/Y') }} - {{$blog->user->name}}</h3>
            <p>{{ $blog->content }}</p>
            
            @if($blog->user_id === auth()->id())
                <a href="{{ route('blog.edit', ['id' => $blog->id]) }}">{{ __('Edit') }}</a>
            @endif
        </div>
    </div>
</div>
@endsection
