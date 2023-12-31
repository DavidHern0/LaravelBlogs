@extends('layouts.app')

@section('title', __('LaravelBlogs'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ __('Search results for') }}: <i>{{ $search }}</i></h1>
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
