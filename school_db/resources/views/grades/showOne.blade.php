@extends('layout')

@section('content')
<h1>Jegyek</h1>
<div>
    @include('success')
    <a href="{{ route('grades.create') }}" title="Új">Új jegy hozzáadása</a>
    @foreach($students as $student)
        @if($student->id == $selectedStudentID)
            <div class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
            <div class="col id">{{ $grade->id }}</div>
            @foreach($subjects as $subject)
                @if($subject->id == $grade->subject_id)
                <div class="col">{{$subject->name}}</div>
                @endif
            @endforeach
            <div class="col">{{$student->name}}</div>
            <div class="col">{{$grade->grade}}</div>
            <div class="right">
            <div class="col"><a href="{{ route('grades.show', $grade->id) }}"><button name="btn-show">Mutat</button></a></div>
            @if(auth()->check())
                <div class="col"><a href="{{ route('grades.edit', $grade->id) }}"><button name="btn-mod">Módosítás</button></a></div>
                <div class="col">
                    <form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="btn-del">Törlés</button>
                    </form>
                </div>
            @endif
            </div>
            </div>
        @endif
    @endforeach
</div>
@endsection