@extends('layout')
@section('content')
    <div>
        @include('error')
        <form action="{{ route('grades.update', $grade->id) }}" method="post">
            @csrf
            @method('PATCH')
            <fieldset>
                <label for="subject_id">Tantárgy ID-je</label>
                <input type="text" id="subject_id" name="subject_id" required value="{{ old('subject_id', $grade->subject_id) }}">
            </fieldset>
            <fieldset>
                <label for="student_id">Diák ID-je</label>
                <input type="text" id="student_id" name="student_id" required value="{{ old('student_id', $grade->student_id) }}">
            </fieldset>
            <fieldset>
                <label for="grade">Érdemjegy</label>
                <input type="text" id="grade" name="grade" required value="{{ old('name', $grade->grade) }}">
            </fieldset>
            <button type="submit">Ment</button>
            <a href="{{ route('grades.index') }}">Mégse</a>
        </form>
    </div>
@endsection