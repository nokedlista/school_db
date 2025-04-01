@extends('layout')
@yield('content')
</main>

	
@section('content')
<h1>Osztály hozzáadása</h1>
<div>
    @include('error')

    <form action="{{route('school_classes.store')}}" method="post">
        @csrf
        <fieldset>
            <label for="name">Megnevezés</label>
            <input type="text" id="name" name="name">
        </fieldset>
        <fieldset>
            <label for="school_year">Kezdési év</label>
            <input type="text" id="school_year" name="school_year">
        </fieldset>
        <button type="submit">Ment</button>
        <a href="{{ route('school_classes.index') }}">Mégse</a>
    </form>
</div>
@endsection