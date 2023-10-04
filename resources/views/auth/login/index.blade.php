@extends('layouts.app')

@section('title', __('Login'))

@section('content')
<div class="container">
    <form method="POST" action="{{ route('login') }}" class="mt-5">
        @csrf
        <h1 class="mb-4">{{ __('Login') }}</h1>

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('example@gmail.com') }}" required>
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
        </div>

        <button type="submit" class="btn btn-primary mt-4">{{ __('Login') }}</button>
    </form>
</div>
@endsection
