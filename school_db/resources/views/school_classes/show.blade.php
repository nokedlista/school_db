@extends('layout')
@section('content')
<div class="detail-container">
    <h1>{{ $school_class->name }} osztály</h1>
    <div class="detail_row">
        <div>{{ $school_class->id }}</div>
        <div>{{$school_class->name}}</div>
        <div>{{$school_class->school_year}}</div>
    </div>
</div>
@endsection