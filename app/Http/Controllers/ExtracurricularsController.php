<?php

namespace App\Http\Controllers;

use App\Models\Extracurriculars;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ExtracurricularsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurriculars = Extracurriculars::with('pembina')->paginate(10);
        return view('extracurriculars.index', compact('extracurriculars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('extracurriculars.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Extracurriculars::create($request->all());

        return redirect()->route('extracurriculars.index')->with('success', 'Ekstrakurikuler ditambahkan');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extracurriculars $extracurriculars)
    {
         $teachers = Teacher::all();
        return view('extracurriculars.edit', compact('extracurricular', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extracurriculars $extracurriculars)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $extracurriculars->update($request->all());

        return redirect()->route('extracurriculars.index')->with('success', 'Ekstrakurikuler diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurriculars $extracurriculars)
    {
        $extracurriculars->delete();
        return redirect()->route('extracurriculars.index')->with('success', 'Ekstrakurikuler dihapus');
    }
}
