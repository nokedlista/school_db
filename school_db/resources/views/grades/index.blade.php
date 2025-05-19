@extends('layout')

@section('content')
<h1>Jegyek</h1>
<div>
	@include('success')
	<!-- <a href="{{ route('grades.create') }}" title="Új">Új jegy hozzáadása</a> </br>
	<form method="post" name="studentSelect" action="{{ route('grades.showOne', ) }}">
		<label for="student">Válasszon egy diákot:</label>
		<select name="students" id="students">
			<option selected value="">Összes diák</option>
			@foreach($students as $student)
			<option selected value="$student->id">{{$student->name}}</option>
			@endforeach
		</select>
		<button type='submit' name='submitButton'>Mutat</button>
	</form> -->
	<a href="{{ route('grades.create') }}" title="Új">Jegy hozzáadása</a>
	<div class="row even">
		<div class="col">Tantárgy</div>
		<div class="col">Tanuló</div>
		<div class="col">Osztályzat</div>
		<div class="col"></div>
		<div class="col"></div>
	</div>
	@foreach($grades as $grade)
	<div class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
		@foreach($subjects as $subject)
			@if($subject->id == $grade->subject_id)
				<div class="col">{{$subject->name}}</div>
			@endif
		@endforeach
		@foreach($students as $student)
			@if($grade->student_id == $student->id)
				<div class="col">{{$student->name}}</div>
			@endif
		@endforeach
		<div class="col">{{$grade->grade}}</div>
		@if(auth()->check())
		<div class="col"><a href="{{ route('grades.edit', $grade->id) }}"><button>Módosítás</button></a></div>
		<div class="col">
			<form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" name="btn-del-grade">Törlés</button>
			</form>
		</div>
		@endif
	</div>
	@endforeach
</div>
@endsection