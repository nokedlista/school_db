@extends('layout')
@section('content')
<div class="detail-container">
    <h1>{{ $subject->name }} tantárgy</h1>
    <div class="detail_row">
        <div>{{ $subject->id }}</div>
        <div>{{$subject->name}}</div>
    </div>
</div>
@endsection