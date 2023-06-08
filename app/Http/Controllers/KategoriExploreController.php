<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use App\Models\KategoriExplore;
use Illuminate\Http\Request;

class KategoriExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kategori'] = KategoriExplore::get();

        // dd($data['kategori']);
        return view('backend.pages.kategori.index', $data);
    }

    public function manageExplore($id){
        $data['kategori'] = KategoriExplore::find($id);
        $data['explore'] = Explore::where('id_kategori',$id)->get();
        return view('backend.pages.kategori.manage-explore', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'kategori' => 'required',
        ]);

        $data = new KategoriExplore();
        $data->kategori = $request->kategori;
        $data->save();

        session()->flash('success', 'Data has been created !!');
        return redirect()->back();
    }
    
    public function storeManageExplore(Request $request)
    {
        $validateData = $request->validate([
            'id_kategori' => 'required',
            'nama_wisata' => 'required',
            'deskripsi_wisata' => 'required',
        ]);

        $data = new Explore();
        $data->id_kategori = $request->id_kategori;
        $data->nama_wisata = $request->nama_wisata;
        $data->deskripsi_wisata = $request->deskripsi_wisata;
        $data->save();

        session()->flash('success', 'Data has been created !!');
        return redirect()->back();
    }

    public function updateManageExplore(Request $request,$id)
    {
        $validateData = $request->validate([
            'id_kategori' => 'required',
            'nama_wisata' => 'required',
            'deskripsi_wisata' => 'required',
        ]);

        $data = Explore::find($id);
        $data->id_kategori = $request->id_kategori;
        $data->nama_wisata = $request->nama_wisata;
        $data->deskripsi_wisata = $request->deskripsi_wisata;
        $data->save();

        session()->flash('success', 'Data has been edited !!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriExplore  $kategoriExplore
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriExplore $kategoriExplore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriExplore  $kategoriExplore
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriExplore $kategoriExplore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriExplore  $kategoriExplore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'kategori' => 'required',
        ]);

        $data = KategoriExplore::find($id);
        $data->kategori = $request->kategori;
        $data->save();

        session()->flash('success', 'Data has been edited !!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriExplore  $kategoriExplore
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KategoriExplore::find($id);
        $data->delete();

        session()->flash('success', 'Data has been deleted !!');
        return redirect()->back();
    }
    
    public function deleteManageExplore($id)
    {
        $data = Explore::find($id);
        $data->delete();

        session()->flash('success', 'Data has been deleted !!');
        return redirect()->back();
    }
}
