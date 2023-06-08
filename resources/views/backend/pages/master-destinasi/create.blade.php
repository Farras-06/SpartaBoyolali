
@extends('backend.layouts.master')

@section('title')
Destinasi Create - Admin Panel
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left font-weight-bold font-weight-bold">Destinasi Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('destinasi-list') }}">List Destinasi</a></li>
                    <li><span>Create Destinasi</span></li>
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
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create New Destinasi</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('destinasi-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Gambar Thumbnail</label>
                                <input type="file" class="form-control "  id="name" name="gambar" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Nama Destinasi</label>
                                <input type="text" class="form-control" id="name" name="nama" placeholder="Enter Nama Destinasi">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="Deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="Deskripsi" name="deskripsi" placeholder="Enter Deskripsi">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Harga Tiket</label>
                                <input type="number" class="form-control" id="name" name="harga_tiket" placeholder="Enter Nama Harga Tiket">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="Deskripsi">Lokasi</label>
                                <input type="text" class="form-control" id="Deskripsi" name="lokasi" placeholder="Enter Deskripsi">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Jam Buka</label>
                                <input type="time" class="form-control" id="name" name="jam_buka" placeholder="Enter Jam Buka">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="Deskripsi">Jam Tutup</label>
                                <input type="time" class="form-control" id="Deskripsi" name="jam_tutup" placeholder="Enter Jam Tutup">
                            </div>
                        </div>

                
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Destinasi</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
    $(document).ready(function() {
        $('.select2').select2();


    })
</script>
@endsection