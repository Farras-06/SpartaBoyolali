
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
    


  <div class="row">
    <div class="col-lg-12">
        <div id="container"></div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <table id="dataTable" class=" table text-center">
              <thead>
                <tr>
                  <td>No</td>
                  <td>No Tiket</td>
                  <td>Destinasi</td>
                  <td>Tanggal</td>
                  <td>Jam</td>
                  <td>Jumlah Tiket</td>
                  <td>Jumlah Bayar</td>
                  <td>Status Bayar</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($pesan as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_tiket }}</td>
                    <td>{{ $item->destinasi->nama }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->jumlah_tiket }}</td>
                    <td> @currency($item->jumlah_bayar) </td>
                    <td> 
                      @if ($item->status == 'Paid')
                        {{ $item->status }}
                      @else
                      Waiting Pay
                      <a href="{{ route('pesanan',$item->id) }}" class="btn btn-success">Pay</a>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>


</script>
@endsection