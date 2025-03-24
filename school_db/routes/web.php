<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GradeController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('layout');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::patch('/school_classes/{school_classe}', [SchoolClassController::class, 'update'])->name('school_classes.update');
    Route::get('/school_classes/{school_classe}/edit', [SchoolClassController::class, 'edit'])->name('school_classes.edit');
    Route::delete('/school_classes/{school_classe}', [SchoolClassController::class, 'destroy'])->name('school_classes.destroy');

    Route::patch('/students/{student}', [GradeController::class, 'update'])->name('students.update');
    Route::get('/students/{student}/edit', [GradeController::class, 'edit'])->name('students.edit');
    Route::delete('/students/{student}', [GradeController::class, 'destroy'])->name('students.destroy');

    Route::patch('/grades/{grade}', [StudentController::class, 'update'])->name('grades.update');
    Route::get('/grades/{grade}/edit', [StudentController::class, 'edit'])->name('grades.edit');
    Route::delete('/grades/{grade}', [StudentController::class, 'destroy'])->name('grades.destroy');

    Route::patch('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

});


Route::post('/grades', [GradeController::class, 'store'])->name('grades.store');
Route::get('/grades/create', [GradeController::class, 'create'])->name('grades.create');
Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
Route::get('/grades/{grade}', [GradeController::class, 'show'])->name('grades.show');

Route::post('/school_classes', [SchoolClassController::class, 'store'])->name('school_classes.store');
Route::get('/school_classes/create', [SchoolClassController::class, 'create'])->name('school_classes.create');
Route::get('/school_classes', [SchoolClassController::class, 'index'])->name('school_classes.index');
Route::get('/school_classes/{school_classe}', [SchoolClassController::class, 'show'])->name('school_classes.show');

Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');

Route::get('/auth/register', [ProfileController::class, 'index'])->name('register');

require __DIR__.'/auth.php';
