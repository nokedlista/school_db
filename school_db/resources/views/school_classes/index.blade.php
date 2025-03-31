@extends('layout')

@section('content')
<h1>Tanórák</h1>
<div>
    @include('success')
    <a href="{{ route('school_classes.create') }}" title="Új">Osztály hozzáadása</a>
	@foreach($school_classes as $school_class)
		<div class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
			<div class="col id">{{ $school_class->id }}</div>
			<div class="col">{{$school_class->name}}</div>
            <div class="col">{{$school_class->school_year}}</div>
			<div class="right">
				<div class="col"><a href="{{ route('school_classes.show', $school_class->id) }}"><button>Mutat</button></a></div>
				@if(auth()->check())
					<div class="col"><a href="{{ route('school_classes.edit', $school_class->id) }}"><button>Módosít</button></a></div>
					<div class="col">
						<form action="{{ route('school_classes.destroy', $school_class->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" name="btn-del-school_class">Töröl</button>
						</form>
					</div>
				@endif
			</div>
		</div>
	@endforeach
</div>
@endsection