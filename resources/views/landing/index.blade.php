@extends('layouts.app')

@section('title', __('LaravelBlogs'))

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
                    <div class="card-body mx-3">
                        <h1>{{ __('Latest blogs') }}</h1>
                        <x-blog-list :blogs="$blogs" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer mt-4 pagination_div">
            <div class="d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
@endsection
