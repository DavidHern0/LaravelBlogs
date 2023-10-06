@extends('layouts.app')

@section('title', __('LaravelBlogs'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="card">
                    <div class="card-body mx-3">
                        <div class="mb-5">
                            <h1 class="mb-4">{{ __('My blogs') }}</h1>
                            <a class="button button-show" href="{{ route('blog.create') }}" draggable="false">{{ __('Create new blog') }}</a>
                        </div>
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
