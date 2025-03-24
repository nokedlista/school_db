@extends('layout')
@yield('content')
</main>

	
@section('content')
<h1>Érdemjegy hozzáadása</h1>
<div>
    @include('error')

    <form action="{{route('grades.store')}}" method="post">
        @csrf
        <fieldset>
            <label for="subject_id">Tantárgy ID-je</label>
            <input type="text" id="subject_id" name="subject_id">
        </fieldset>
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