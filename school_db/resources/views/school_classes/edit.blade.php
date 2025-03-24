@extends('layout')
@section('content')
    <div>
        @include('error')
        <form action="{{ route('school_classes.update', $school_class->id) }}" method="post">
            @csrf
            @method('PATCH')
            <fieldset>
                <label for="name">Megnevezés</label>
                <input type="text" id="name" name="name" required value="{{ old('name', $school_class->name) }}">
            </fieldset>
            <fieldset>
                <label for="school_year">Évfolyam</label>
                <input type="text" id="school_year" name="school_year" required value="{{ old('school_year', $school_class->school_year) }}">
            </fieldset>
            <button type="submit">Ment</button>
            <a href="{{ route('school_classes.index') }}">Mégse</a>
        </form>
    </div>
@endsection