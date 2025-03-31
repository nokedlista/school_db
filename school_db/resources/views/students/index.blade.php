@extends('layout')

@section('content')
<h1>Diákok</h1>
<div>
    @include('success')
    <a href="{{ route('students.create') }}" title="Új">Diák hozzáadása</a>
	@foreach($students as $student)
		<div class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
			<div class="col id">{{ $student->id }}</div>
			<div class="col">{{$student->name}}</div>
			<div class="right">
				<div class="col"><a href="{{ route('students.show', $student->id) }}"><button>Mutat</button></a></div>
				@if(auth()->check())
					<div class="col"><a href="{{ route('students.edit', $student->id) }}"><button></i>Módosít</button></a></div>
					<div class="col">
						<form action="{{ route('students.destroy', $student->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" name="btn-del-student">Töröl</button>
						</form>
					</div>
				@endif
			</div>
		</div>
	@endforeach
</div>
@endsection