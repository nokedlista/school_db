@extends('layout')
@section('content')
    <div>
        @include('error')
        <form action="{{ route('students.update', $student->id) }}" method="post">
            @csrf
            @method('PATCH')
            <fieldset>
                <label for="name">Neve</label>
                <input type="text" id="name" name="name" required value="{{ old('name', $student->name) }}">
            </fieldset>
            <fieldset>
                <label for="class_id">Osztály ID-je</label>
                <input type="text" id="class_id" name="class_id" required value="{{ old('class_id', $student->class_id) }}">
            </fieldset>
            <fieldset>
                <label for="gender">Neme</label>
                <input type="text" id="gender" name="gender" required value="{{ old('gender', $student->gender) }}">
            </fieldset>
            <button type="submit">Ment</button>
            <button><a href="{{ route('students.index') }}">Mégse</a></button>
        </form>
    </div>
@endsection