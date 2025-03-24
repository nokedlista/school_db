@extends('layout')
<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
@section('content')
    <div>
        <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
        @include('error')
        <form action="{{ route('bodies.update', $body->id) }}" method="post">
            @csrf
            @method('PATCH')
            <fieldset>
                <label for="name">MegnevezĂŠs</label>
                <input type="text" id="name" name="name" required value="{{ old('name', $body->name) }}">
            </fieldset>
            <button type="submit">Ment</button>
            <a href="{{ route('bodies.index') }}">MĂŠgse</a>
        </form>
    </div>
@endsection