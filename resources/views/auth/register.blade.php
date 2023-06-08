@extends('backend.auth.auth_master')

@section('auth_title')
    Register | Admin Panel
@endsection

@section('auth-content')
     <!-- login area start -->
     <div class="login-area" style="background-image: url({{asset('img/Bg_Login.jpg')}});background-size: cover;background-position: center;">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('post-register') }}">
                    @csrf
                    <div class="login-form-head">
                        <h4>Register</h4>
                        <p>Hello there, Sign in and start managing your Account</p>
                    </div>
                    <div class="login-form-body">
                        @include('backend.layouts.partials.messages')
                        <input type="hidden" name="roles[]" value="Role Pengunjung">

                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" id="name" name="username" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Sign In <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
@endsection