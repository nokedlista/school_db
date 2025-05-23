<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\SchoolClass;
use App\Http\Requests\BasicRequest;
use App\Models\Student;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_classes = SchoolClass::all();
        return view('school_classes.index', compact('school_classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school_classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BasicRequest $request)
    {
        $school_class = new SchoolClass();
        $school_class->create($request->all());

        return redirect()->route('school_classes.index')->with('success', "Sikeresen létrehozva");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class_name = SchoolClass::find($id)->name;
        $call_id = $id;
        $students = Student::all();
        return view('school_classes.show', compact('students', 'call_id', 'class_name'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $school_class = SchoolClass::find($id);
        return view('school_classes.edit', compact('school_class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BasicRequest $request, string $id)
    {
        $school_class = SchoolClass::findOrFail($id);
        $school_class->update($request->all());

        return redirect()->route('school_classes.index')->with('success', "{$school_class->name} sikeresen módosítva");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $school_class = SchoolClass::find($id);
        $school_class->delete();

        return redirect()->route('school_classes.index')->with('success', "Sikeresen törölve");
    }
}
