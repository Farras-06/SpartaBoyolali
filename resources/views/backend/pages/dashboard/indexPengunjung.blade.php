
@extends('backend.layouts.master')

@section('title')
Dashboard Page - Admin Panel
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left font-weight-bold font-weight-bold">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Dashboard</span></li>
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
    <div class="col-lg-12">
        <div class="card shadow-lg" style="background-color: silver">
            <div class="card-header">
              Dashboard    
            </div>
            <div class="card-body" style="background-color: #a2ffa2">
              <h5 class="card-title">Selamat Datang</h5>
              <p class="card-text">Selamat Datang. anda berhasil login ke dalam E-Wisata. silahkan explore menu anda di sebelah kiri untuk melihat data pesanan anda beserta statusnya</p>
              <a href="{{ url('/#destinasi') }}" class="btn btn-primary">Pilih Wisata</a>
            </div>
          </div>
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-sm-6">
      <div class="card shadow-lg" style="background: orange;color:white">
        <div class="card-body">
            <center>
                <h5 class="card-title">Pesanan Anda</h5>
                <p class="card-text" style="color: white">{{ $pesananBelumSelesai }}</p>
            </center>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card shadow-lg" style="background: green;color:white">
        <div class="card-body">
            <center>
                <h5 class="card-title">Pesanan Selesai</h5>
                <p class="card-text" style="color: white">{{ $pesananSelesai }}</p>
            </center>
        </div>
      </div>
    </div>
  </div>
 
</div>

@endsection