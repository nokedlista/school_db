@extends('layout')
@section('content')
    <div>
        @include('error')
        <form action="{{ route('subjects.update', $subject->id) }}" method="post">
            @csrf
            @method('PATCH')
            <fieldset>
                <label for="name">Tantárgy</label>
                <input type="text" id="name" name="name" required value="{{ old('name', $subject->name) }}">
            </fieldset>
            <button type="submit">Ment</button>
            <a href="{{ route('subjects.index') }}">Mégse</a>
        </form>
    </div>
@endsection