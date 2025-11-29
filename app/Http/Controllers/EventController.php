<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::latest()->paginate(10);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi'  => 'required|string',
            'tanggal'    => 'required|date',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('events','public');
        }

        Events::create($data);

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Events $event)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi'  => 'required|string',
            'tanggal'    => 'required|date',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('events','public');
        }

        $event->update($data);

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus');
    }
}
