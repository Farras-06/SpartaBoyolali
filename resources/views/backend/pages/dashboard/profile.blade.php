
@extends('backend.layouts.master')

@section('title')
Profile Page - Admin Panel
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left font-weight-bold font-weight-bold">Profile</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Profile</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">

  <div class="row mt-4">
    <div class="col-12 mt-5">
      <div class="card">
          <div class="card-body">
              <h4 class="header-title">Edit Profile - {{ $user->name }}</h4>
              @include('backend.layouts.partials.messages')
              
              <form action="{{ route('profile-update', $user->id) }}" method="POST">
                  @csrf
                  <div class="form-row">
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="name">User Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}">
                      </div>
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="email">User Email</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $user->email }}">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="email">Username</label>
                          <input type="text" class="form-control" id="email" name="username" placeholder="Enter Username" value="{{ $user->username }}">
                      </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                      </div>
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="password_confirmation">Confirm Password</label>
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                      </div>
                  </div>

                  <input type="hidden" name="roles[]" value="Role Pengunjung">
                  
                  <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save</button>
              </form>
          </div>
      </div>
  </div>
  </div>
</div>

  
</div>


@endsection