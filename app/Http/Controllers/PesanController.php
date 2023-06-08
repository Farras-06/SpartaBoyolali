<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\GaleryDestinasi;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function storePesanan(Request $request)
    {

        $data = new Pesan();
        $data->id_destinasi = $request->id_destinasi;
        $data->tanggal = $request->tanggal;
        $data->jam = $request->jam;
        $data->jumlah_tiket = $request->jumlah_tiket;
        $data->jumlah_bayar = $request->jumlah_bayar;
        $data->no_tiket = rand();
        $data->status = 'Waiting Payment';
        $data->id_user = $this->user->id;
        $data->save();

        session()->flash('success', 'Data has been created !!');
        return redirect()->route('pesanan',$data->id);
    }

    public function pembayaran($id)
    {
        $data['pesan'] = Pesan::find($id);
        $id_destinasi = $data['pesan']->id_destinasi;

        // AMBIL DATA DESTINASI
        $data['destinasi'] = Destinasi::find($id_destinasi)->first();
        
        $data['gelery'] = GaleryDestinasi::where('id_destinasi',$id_destinasi)->get();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-rk2E-5zb-yxIzO0QNN8VB4yN';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data['pesan']->jumlah_bayar,
            ),
            // 'customer_details' => array(
            //     'first_name' => 'budi',
            //     'last_name' => 'pratama',
            //     'email' => 'budi.pra@example.com',
            //     'phone' => '08111222333',
            // ),
        );

        $data['snapToken'] = \Midtrans\Snap::getSnapToken($params);

        return view('FE.pembayaran', $data);
    }

    public function bayar(Request $request)
    {

        $id = $request->id_pesanan;
        $data = Pesan::find($id);
        $data->status = 'Paid';
        $data->save();

        session()->flash('success', 'Payment Successfully !!');
        return redirect()->route('pesanan',$data->id);
    }

    public function history(){

        if (is_null($this->user)) {

            $data['pesan'] = [];
        }else {
            # code...
            $data['pesan'] = Pesan::where('id_user',$this->user->id)->get();
        }

        // dd($data['pesan'],$this->user->id);
        return view('FE.history', $data);

    }
    public function listPesanan(){

        if (is_null($this->user)) {

            $data['pesan'] = [];
        }else {
            # code...
            $data['pesan'] = Pesan::where('id_user',$this->user->id)->get();
        }

        // dd($data['pesan'],$this->user->id);
        return view('backend.pages.dashboard.pesanan',$data);

    }

}
