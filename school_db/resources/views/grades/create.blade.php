@extends('layout')
@yield('content')
</main>

	
@section('content')
<h1>Érdemjegy hozzáadása</h1>
<div>
    @include('error')

    <form action="{{route('grades.store')}}" method="post">
        @csrf
        <label for="subject_ID">Tantárgy ID-je</label>
        <select name="subject_id" id="subject_id">
            <option value="">--- Válassz egy tantárgyat ---</option>
            @foreach($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
        <fieldset>
            <label for="student_id">Diák ID-je</label>
            <input type="text" id="student_id" name="student_id">
        </fieldset>
        <fieldset>
            <label for="grade">Érdemjegy</label>
            <input type="text" id="grade" name="grade">
        </fieldset>
        <button type="submit">Ment</button>
        <a href="{{ route('grades.index') }}">Mégse</a>
    </form>
</div>
@endsection