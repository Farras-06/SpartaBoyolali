@extends('backend.auth.auth_master')

@section('auth_title')
    Login | Admin Panel
@endsection

@section('auth-content')
     <!-- login area start -->
     <div class="login-area bg-image overlay" style="background-image: url({{asset('img/Bg_Login.jpg')}});background-size: cover;background-position: center;" >
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Hello there, Sign in and start managing your Admin Panel</p>
                    </div>
                    <div class="login-form-body">
                        @include('backend.layouts.partials.messages')
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address or Username</label>
                            <input type="text" id="exampleInputEmail1" name="email">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Sign In <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="row mb-4 rmber-area mt-2">
                            <div class="col-12">
                                <label class="" for="">Belum punya akun? <a href="{{ url('register-pengunjung') }}">Klik Disini</a> </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
@endsection