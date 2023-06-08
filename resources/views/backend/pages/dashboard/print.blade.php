<style>
    td{
        padding: 10px;
    }
</style>
<center><h1>Laporan</h1></center>
<h3>Pemasukan Lunas : @currency($sumLunas) </h3>
<?php  
    $jumlahTiket = 0;
?>
@foreach ($dataTiket as $item)
    <?php  
        $jumlahTiket += $item->jumlah_tiket
    ?>
@endforeach
<h3>Jumlah Tiket : {{ $jumlahTiket }} </h3>
<table border="1" class=" table text-center" cellspacing="0">
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

    window.print()

</script>
