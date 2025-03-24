@extends('layout')
@section('content')
    <h1>"{{ $grade->name }}" érdemjegy</h1>
    <div class="row">
        <div><p>ID-je: </p>{{ $grade->id }}</div>
        <div><p>Tantárgy ID-je: </p>{{ $grade->subject_id }}</div>
        <div><p>Diák ID-je: </p>{{ $grade->student_id }}</div>
        <div><p>Érdemjegy: </p>{{$grade->grade}}</div>
        <div><p>Hozzáadva: </p>{{ $grade->created_at }}</div>
    </div>
@endsection 