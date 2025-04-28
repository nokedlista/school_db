@extends('layout')
@section('content')
<div class="detail-container">
    <h1>{{ $class_name }} osztály</h1>
    <div class="detail_row">
        <div class="row even">
            <div class="col">ID</div>
            <div class="col">Diák</div>
            <div class="col">Osztály azonosító</div>
            <div class="col">Neme</div>
        </div>
        @foreach($students as $student)
            @if($student->class_id == $call_id)
                <div class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                    <div class="col">{{ $student->id }}</div>
                    <div class="col">{{$student->name}}</div>
                    <div class="col">{{$student->class_id}}</div>
                    <div class="col">{{$student->gender}}</div>
                    <div class="right">
                        <div class="col"><a href="{{ route('students.show', $student->id) }}"><button>Mutat</button></a></div>
                            @if(auth()->check())
                                <div class="col"><a href="{{ route('students.edit', $student->id) }}"><button class='btn-mod'>Módosít</button></a></div>
                                <div class="col">
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="btn-del" class="btn-del">Töröl</button>
                                    </form>
                                </div>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    
    </div>
</div>
@endsection