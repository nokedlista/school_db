@extends('layout')
@section('content')
<div class="detail-container">
    <h1>Érdemjegy</h1>
    <div class="detail_row">
        <div>
            <p>ID-je: </p>{{ $grade->id }}
        </div>
        <div>
            <p>Tantárgy ID-je: </p>{{ $grade->subject_id }}
        </div>
        <div>
            <p>Diák ID-je: </p>{{ $grade->student_id }}
        </div>
        <div>
            <p>Érdemjegy: </p>{{$grade->grade}}
        </div>
        <div>
            <p>Hozzáadva: </p>{{ $grade->created_at }}
        </div>
    </div>
</div>
@endsection