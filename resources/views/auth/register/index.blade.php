@extends('layouts.app')

@section('title', __('Register'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" class="mt-5">
                            @csrf
                            <h1 class="mb-4">{{ __('Register') }}</h1>

                            <div class="form-group">
                                <label for="name">{{ __('Full name') }}</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="{{ __('Full name') }}" required>
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="{{ __('example@gmail.com') }}" required>
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="********" required>
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Confirm password') }}</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="********" required>
                                @error('password_confirmation')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="button button-show mt-4">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
