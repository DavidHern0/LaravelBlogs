@extends('layouts.app')

@section('title', __('Create blog'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">{{ __('Create blog') }}</h1>
                    <form method="POST" action="{{ route('blog.store') }}" class="mt-5">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}:</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Title') }}" required>
                            @error('title')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">{{ __('Content') }}:</label>
                            <textarea name="content" id="content" class="form-control" placeholder="{{ __('Content') }}" required></textarea>
                            @error('content')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mt-4">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
