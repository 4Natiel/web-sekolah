<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::with('teachers')->get();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('classes.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'code' => 'required|string|max:20|unique:classes,code',
            'teachers' => 'array'
        ]);

        $class = SchoolClass::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        if ($request->teachers) {
            $class->teachers()->sync($request->teachers);
        }

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function edit(SchoolClass $class)
    {
        $teachers = Teacher::all();
        return view('classes.edit', compact('class', 'teachers'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'code' => 'required|string|max:20|unique:classes,code,' . $class->id,
            'teachers' => 'array'
        ]);

        $class->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        $class->teachers()->sync($request->teachers);

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(SchoolClass $class)
    {
        $class->teachers()->detach(); // hapus relasi pivot
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
