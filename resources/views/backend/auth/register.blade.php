@extends('backend.auth.auth_master')

@section('auth_title')
    Register | Admin Panel
@endsection

@section('auth-content')
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="POST" action="{{ route('admin.register.submit') }}">
                @csrf
                <div class="login-form-head">
                    <h4>Register</h4>
                    <p>Create your admin account</p>
                </div>
                <div class="login-form-body">
                    @include('backend.layouts.partials.messages')

                    <div class="form-gp">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}">
                        <i class="ti-user"></i>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-gp">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}">
                        <i class="ti-id-badge"></i>
                        @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-gp">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}">
                        <i class="ti-email"></i>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-gp">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <i class="ti-lock"></i>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-gp">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation">
                        <i class="ti-lock"></i>
                    </div>

                    <div class="submit-btn-area mt-4">
                        <button type="submit">Register <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="text-center mt-3">
                        Already have an account? <a href="{{ route('admin.login') }}">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
