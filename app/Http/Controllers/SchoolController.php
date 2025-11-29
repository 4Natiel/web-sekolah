<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $school = School::singleton();
        return view('school.index', compact('school'));
    }

    public function edit()
    {
        $school = School::singleton(); // ambil singleton dari model
        return view('school.edit', compact('school'));
    }
    public function show()
    {
        $school = School::singleton();
        return view('school.show', compact('school'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah'  => 'required|string|max:150',
            'npsn'  => 'nullable|string|max:20',
            'jenjang'  => 'required|string|max:50',       // SD / SMP / SMA / SMK
            'status'  => 'required|string|max:50',       // Negeri / Swasta
            'alamat'  => 'required|string|max:255',
            'kecamatan'  => 'required|string|max:100',
            'kota'  => 'required|string|max:100',
            'provinsi'  => 'required|string|max:100',
            'email'  => 'nullable|email|max:100',
            'telepon'  => 'nullable|string|max:20',
            'website'  => 'nullable|url|max:150',
            'description'  => 'nullable|string',
            'logo'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $school = School::singleton();

        // Upload logo jika ada
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $school->update($validated);

        return redirect()->route('school.edit')->with('success', 'Data sekolah berhasil diperbarui!');
    }
}
