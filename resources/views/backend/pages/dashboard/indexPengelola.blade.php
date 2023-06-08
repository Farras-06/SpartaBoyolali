
@extends('backend.layouts.master')

@section('title')
Dashboard Page - Admin Panel
@endsection


@section('admin-content')
  <!-- Start datatable css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
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
    <form action="" method="get">
    @csrf
    <div class="row mt-3 mb-3">
            <div class="col-sm-4">
                <input type="date" class="form-control" name="start_date" value="{{ Request::get('start_date') }}">
            </div>
            <div class="col-sm-4">
                <input type="date" class="form-control" name="end_date" value="{{ Request::get('end_date') }}">
            </div>
            <div class="col-sm-4">
                <button class="btn btn-primary">Send</button>
            </div>
        </div>
    </form>

<div class="row mt-3 mb-3">
    <div class="col-sm-4">
        Pemasukan Belum Lunas :  @currency($sumBelumLunas) 
    </div>
    <div class="col-sm-4">
        Pemasukan Lunas :  @currency($sumLunas) 
    </div>
</div>

  <div class="row">
    <div class="col-lg-12">
        <div id="container"></div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 d-flex">
                        <input type="text" class="form-control w-25" name="no_tiket" placeholder="Cari No Tiket">
                        <button type="button" onclick="search()" class="btn btn-search btn-dark">Cari</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" onclick="printReport()" class="btn btn-dark float-right">Print</button>
                    </div>
                </div>
                <table id="dataTable" class=" table text-center">
                    <thead class="bg-light text-capitalize">
                        <tr>
                            <td>No</td>
                            <td>Nama Destinasi</td>
                            <td>No Tiket</td>
                            <td>Tanggal Kunjungan</td>
                            <td>Tanggal Pembuatan Pesanan</td>
                            <td>Jumlah Tiket</td>
                            <td>Jumlah Bayar</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTiket as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @php
                                    $data = \App\Models\Destinasi::where('id',$item->id_destinasi)->first();
                                @endphp
                                <td>{{ $data->nama }}</td>
                                <td>{{ $item->no_tiket }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->jumlah_tiket }}</td>
                                <td>{{ $item->jumlah_bayar }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
 
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
// Data retrieved from https://netmarketshare.com/
// Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Statistik Pemasukan',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Share',
        data: [
            { name: 'Pemasukan Lunas', y: @json($totalLunas) },
            { name: 'Pemasukan Belum Lunas', y: @json($totalBelumLunas) },
        ]
    }]
}); 

function search(){
    no_tiket = $("[name='no_tiket']").val()
    // location = window.location.href.split("&no_tike")[0]
    // console.log(window.location.href.split("&no_tike")[0])
    window.location.href = window.location.href.split("&no_tike")[0]+'&no_tiket='+no_tiket
}

function printReport(){
    window.open(window.location.href.replace("admin/dashboard-pengelola",'admin/print-pengelola'), '_blank');
}

</script>

@endsection