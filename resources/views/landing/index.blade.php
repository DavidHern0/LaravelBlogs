@extends('layouts.app')

@section('title', __('LaravelBlogs'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
