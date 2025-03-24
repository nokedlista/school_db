@extends('layout')
@section('content')
    <h1>"{{ $student->name }}" diák</h1>
    <div class="row">
        <div>{{$student->name }}</div>
        <div>{{$student->class_id}}</div>
        <div>{{$student->gender}}</div>
    </div>
@endsection 