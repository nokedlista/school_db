<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Student;
use App\Http\Requests\GradeRequest;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        $grades = Grade::all();
        $students = Student::all();
        return view('grades.index', compact('grades', 'subjects', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('grades.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeRequest $request)
    {
        $grade = new Grade();
        $grade->create($request->all());

        return redirect()->route('grades.index')->with('success', "Sikeresen létrehozva");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grade = Grade::find($id);
        return view('grades.show', compact('grade'));
    }

    public function showOne(string $id)
    {
        if($id == "")
        {
            return view('grades.index', compact('grades', 'subjects', 'students'));
        }
        $selectedStudentID = $id;
        $students = Student::all();
        $grades = Grade::all();
        $subjects = Subject::all();
        return view('grades.showOne', compact('grades', 'selectedStudentID', 'students', 'subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grade = Grade::find($id);
        return view('grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeRequest $request, string $id)
    {
        $grade = Grade::findOrFail($id);
        $grade->update($request->all());

        return redirect()->route('grades.index')->with('success', "{$grade->name} sikeresen módosítva");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade = Grade::find($id);
        $grade->delete();

        return redirect()->route('grades.index')->with('success', "Sikeresen törölve");
    }
}
