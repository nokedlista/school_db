@extends('layout')

@section('content')
<div class="detail-container">
    <h1>{{ $student->name }} diák</h1>
    <div class="detail_row">
        <div>Név: {{ $student->name }}</div>
        <div>Osztály ID: {{ $student->class_id }}</div>
        <div>Nem: {{ $student->gender }}</div>
    </div>
</div>
@endsection