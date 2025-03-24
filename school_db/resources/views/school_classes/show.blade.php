@extends('layout')
@section('content')
    <h1>"{{ $school_class->name }}" osztály</h1>
    <div class="row">
        <div>{{ $school_class->id }}</div>
        <div>{{$school_class->name}}</div>
        <div>{{$school_class->school_year}}</div>
    </div>
@endsection 