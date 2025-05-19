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
            <label for="name">Tantárgy</label>
            <input type="text" id="name" name="name">
        </fieldset>
        <button type="submit">Ment</button>
        <button><a href="{{ route('subjects.index') }}">Mégse</a></button>
    </form>
</div>
@endsection