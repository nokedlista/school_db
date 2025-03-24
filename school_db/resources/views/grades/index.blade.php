@extends('layout')

@section('content')
<h1>Jegyek</h1>
<div>
    @include('success')
    <a href="{{ route('grades.create') }}" title="Új">Új jegy hozzáadása</a>
	@foreach($grades as $grade)
		<div class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
			<div class="col id">{{ $grade->id }}</div>
			<div class="col">{{$grade->subject_id}}</div>
			<div class="col">{{$grade->student_id}}</div>
			<div class="col">{{$grade->grade}}</div>
			<div class="right">
				<div class="col"><a href="{{ route('grade.show', $grade->id) }}"><button><i class="fa fa-binoculars" title="Mutat"></i></button></a></div>
				@if(auth()->check())
					<div class="col"><a href="{{ route('grade.edit', $grade->id) }}"><button><i class="fa fa-edit edit" title="Módosítás"></i></button></a></div>
					<div class="col">
						<form action="{{ route('grade.destroy', $grade->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" name="btn-del-grade"><i class="fa fa-trash-can trash" title="Törlés"></i></button>
						</form>
					</div>
				@endif
			</div>
		</div>
	@endforeach
</div>
@endsection