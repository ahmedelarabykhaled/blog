@extends('layouts.main')
@section('content')

<style type="text/css">
	.element
	{
		background-color: #ccc;
	}
</style>

	<div class="rounded container mt-5">
		@foreach($posts as $post)
		<div class="row m-2 element p-2 rounded">
			<div class="col-9">
				<p>{{$post->title}}</p>		
			</div>
			<div class="col-3">
				<a class="btn btn-danger" href="posts/{{$post->id}}">Delete</a>
			</div>
		</div>
		@endforeach		
	</div>



@endsection