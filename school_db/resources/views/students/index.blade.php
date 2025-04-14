@extends('layout')

@section('content')
<h1 class="text-center my-4">Diákok</h1>

<div class="students-container">
	@include('success')

	<div class="mb-3">
		<a href="{{ route('students.create') }}" class="btn btn-primary">➕ Diák hozzáadása</a>
	</div>

	<div class="list-group">
		@foreach($students as $student)
		<div class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
			<div class="d-flex align-items-center" style="min-width: 200px;">
				<span class="badge bg-secondary me-3">{{ $student->id }}</span>
				<strong>{{ $student->name }}</strong>
			</div>

			<div class="btn-group" role="group">
				<a href="{{ route('students.show', $student->id) }}" class="btn btn-success">Mutat</a>

				@if(auth()->check())
				<a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Módosít</a>
				<form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Töröl</button>
				</form>
				@endif
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection