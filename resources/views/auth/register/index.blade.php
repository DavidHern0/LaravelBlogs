@extends('layouts.app')

@section('title', __('Register'))

@section('content')
<div class="container">
    <form method="POST" action="{{ route('register') }}" class="mt-5">
        @csrf
        <h1 class="mb-4">{{ __('Register') }}</h1>

        <div class="form-group">
            <label for="name">{{ __('Username') }}</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Username') }}" required>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" required>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="********" required>
            @error('password_confirmation')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-4">{{ __('Register') }}</button>
    </form>
</div>
@endsection
