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
            <input type="text" id="subject" name="subject">
        </fieldset>
        <button type="submit">Ment</button>
        <button><a href="{{ route('subjects.index') }}">Mégse</a></button>
    </form>
</div>
@endsection