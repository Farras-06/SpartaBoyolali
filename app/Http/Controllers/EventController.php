<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['event'] = Event::get();

        // dd($data['kategori']);
        return view('backend.pages.event.index', $data);
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
            'tanggal' => 'required',
            'nama_event' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
        ]);

        $data = new Event();
        $data->tanggal = $request->tanggal;
        $data->nama_event = $request->nama_event;
        $data->deskripsi = $request->deskripsi;
        $data->llnk = $request->link;
        $data->save();

        session()->flash('success', 'Data has been created !!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'tanggal' => 'required',
            'nama_event' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
        ]);

        $data = Event::find($id);
        $data->tanggal = $request->tanggal;
        $data->nama_event = $request->nama_event;
        $data->deskripsi = $request->deskripsi;
        $data->llnk = $request->link;
        $data->save();

        session()->flash('success', 'Data has been edited !!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       

        $data = Event::find($id);
        $data->delete();

        session()->flash('success', 'Data has been deleted !!');
        return redirect()->back();
    }
}
