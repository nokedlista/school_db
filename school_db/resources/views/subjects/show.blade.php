@extends('layout')

<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
</div>

@section('content')
    <h1>"{{ $subject->name }}" tantárgy</h1>
    <div class="row">
        <div>{{ $subject->id }}</div>
        <div>{{$subject->name}}</div>
    </div>
@endsection 