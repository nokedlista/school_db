@extends('layout')
@yield('content')
</main>
	
@section('content')
<h1>Diák hozzáadása</h1>
<div>
    @include('error')

    <form action="{{route('students.store')}}" method="post">
        @csrf
        <fieldset>
            <label for="name">Név</label>
            <input type="text" id="name" name="name">
        </fieldset>
        <fieldset>
            <label for="class_id">Osztály ID-je</label>
            <input type="text" id="class_id" name="class_id">
        </fieldset>
        <fieldset>
            <label for="gender">Neme</label>
            <input type="text" id="gender" name="gender">
        </fieldset>
        <button type="submit">Ment</button>
        <a href="{{ route('students.index') }}">Mégse</a>
    </form>
</div>
@endsection