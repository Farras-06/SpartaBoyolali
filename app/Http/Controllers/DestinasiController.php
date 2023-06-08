<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Event;
use App\Models\Explore;
use App\Models\GaleryDestinasi;
use App\Models\KategoriExplore;
use Illuminate\Http\Request;
Use File;


class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['destinasi'] = Destinasi::get();
        return view('backend.pages.master-destinasi.index', $data);
    }
    public function home()
    {
        $data['destinasi'] = Destinasi::get();
        $data['kategori'] = KategoriExplore::get();
        $data['explore'] = Explore::get();
        $data['event1'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',1)->get();
        $data['event2'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',2)->get();
        $data['event3'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',3)->get();
        $data['event4'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',4)->get();
        $data['event5'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',5)->get();
        $data['event6'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',6)->get();
        $data['event7'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',7)->get();
        $data['event8'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',8)->get();
        $data['event9'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',9)->get();
        $data['event10'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',10)->get();
        $data['event11'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',11)->get();
        $data['event12'] = Event::whereYear('tanggal',date('Y'))->whereMonth('tanggal',12)->get();
        $data['events'] = Event::all();

        return view('FE.home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.master-destinasi.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'nama'   => 'required|string|min:3',
            'deskripsi' => 'required',
            'harga_tiket' => 'required',
            'lokasi' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
        ]);

        $data = new Destinasi();
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->harga_tiket = $request->harga_tiket;
        $data->lokasi = $request->lokasi;
        $data->jam_buka = $request->jam_buka;
        $data->jam_tutup = $request->jam_tutup;
        

        // disini adalah code untuk iamge
         if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/destinasi/');
            $image->move($destinationPath, $name);
            $data->gambar = $name;
        }

        $data->save();

        session()->flash('success', 'Data has been created !!');
        return redirect()->route('destinasi-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['destinasi'] = Destinasi::find($id);
        $data['gelery'] = GaleryDestinasi::where('id_destinasi',$id)->get();
        return view('FE.detail', $data);
    }
    public function beliTiket($id)
    {
        $data['destinasi'] = Destinasi::find($id);
        $data['gelery'] = GaleryDestinasi::where('id_destinasi',$id)->get();
        return view('FE.beli-tiket', $data);
    }
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd('masuk');
        $data['destinasi'] = Destinasi::find($id);
        return view('backend.pages.master-destinasi.edit', $data);
    }

    public function galery($id)
    {
        // dd('masuk');
        $data['destinasi'] = Destinasi::find($id);
        $data['gelery'] = GaleryDestinasi::where('id_destinasi',$id)->get();
        return view('backend.pages.master-destinasi.galery', $data);
    }

    public function insertImageGalery(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = new GaleryDestinasi();
        // disini adalah code untuk iamge
         if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/destinasi/');
            $image->move($destinationPath, $name);
            $data->gambar = $name;
        }

        $data->id_destinasi = $request->id_destinasi;
        $data->save();

        session()->flash('success', 'Data has been created !!');
        return redirect()->back();
    }

    public function updateImageGalery(Request $request,$id)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = GaleryDestinasi::find($id);
        // disini adalah code untuk iamge
         if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/destinasi/');
            $image->move($destinationPath, $name);
            $data->gambar = $name;
        }

        $data->id_destinasi = $request->id_destinasi;
        $data->save();

        session()->flash('success', 'Data has been edited !!');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'nama'   => 'required|string|min:3',
            'deskripsi' => 'required',
            'harga_tiket' => 'required',
            'lokasi' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
        ]);

        $data = Destinasi::find($id);
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->harga_tiket = $request->harga_tiket;
        $data->lokasi = $request->lokasi;
        $data->jam_buka = $request->jam_buka;
        $data->jam_tutup = $request->jam_tutup;
        

        // disini adalah code untuk iamge
         if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/destinasi/');
            $image->move($destinationPath, $name);
            $data->gambar = $name;
        }

        $data->save();

        session()->flash('success', 'Data has been edited !!');
        return redirect()->route('destinasi-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Destinasi::findOrFail($id);
        if ($data->gambar) {
            $image_path = public_path('img/destinasi/'.$data->gambar); // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }


        $data->delete();
        session()->flash('success', 'Data has been deleted !!');
        return redirect()->route('destinasi-list');
    }
    public function deleteImageGalery($id)
    {
        $data = GaleryDestinasi::find($id);
        if ($data->gambar) {
            $image_path = public_path('img/destinasi/'.$data->gambar); // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        $data->delete();
        session()->flash('success', 'Data has been deleted !!');
        return redirect()->back();
    }
}
