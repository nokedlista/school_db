@extends('layout')

@section('content')
<h1>Tantárgyak</h1>
<div>
    @include('success')
    <a href="{{ route('subjects.create') }}" title="Új">Tantárgy hozzáadása</a>
	@foreach($subjects as $subject)
		<div class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
			<div class="col id">{{ $subject->id }}</div>
			<div class="col">{{$subject->name}}</div>
			<div class="right">
				<div class="col"><a href="{{ route('subjects.show', $subject->id) }}"><button><i class="fa fa-binoculars" title="Mutat"></i></button></a></div>
				@if(auth()->check())
					<div class="col"><a href="{{ route('subjects.edit', $subject->id) }}"><button><i class="fa fa-edit edit" title="Módosít"></i></button></a></div>
					<div class="col">
						<form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" name="btn-del-subject"><i class="fa fa-trash-can trash" title="Törlés"></i></button>
						</form>
					</div>
				@endif
			</div>
		</div>
	@endforeach
</div>
@endsection