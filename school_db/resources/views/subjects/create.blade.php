@extends('layout')
@yield('content')
</main>

	
@section('content')
<h1>Új tantárgy</h1>
<div>
    @include('error')

    <form action="{{route('subjects.store')}}" method="post">
        @csrf
        <fieldset>
            <label for="subject">Tantárgy</label>
            <input type="text" id="grade" name="grade">
        </fieldset>
        <button type="submit">Ment</button>
        <a href="{{ route('subjects.index') }}">Mégse</a>
    </form>
</div>
@endsection