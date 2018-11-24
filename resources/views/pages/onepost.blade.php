@extends('layouts.main')
@section('content')

<style type="text/css">
	.one img
	{
		max-height: 700px;
	}
</style>

<section class="one">

@if(isset($post))
	<div class="card-header"><h2>{{$post->title}}<a href="{{url('post')}}" class="float-right h6">home</a></h2>
		

		@foreach($post->users->get() as $post_user)
			@if($post_user->id == $post->user_id)
				<p>Added By : {{$post->users->name}}</p>
			@endif
		@endforeach
		

	</div>
	<div class="card-body">
		@if($post->images->get(0))
		@foreach($post->images()->get() as $image)
            <img src="http://localhost/blog1/public/upload/{{$image->url}}" class="rounded" alt="Post Image">
        @endforeach
        @else
            <img src="http://localhost/blog1/public/images/1.jpg" class=" rounded">
        @endif
	<p class="my-5">{{$post->body}}</p>

	</div>

</div>


@if(isset($comments))

	@foreach($comments as $comment)

<div class="card my-2">
<div class="card-header">


		@foreach($comment->users->get() as $comment_user)
			@if($comment_user->id == $comment->user_id)
				<p>Added By : {{$comment->users->name}}</p>
			@endif
		@endforeach

</div>
<div class="card-body">
	<p>{{$comment->body}}</p>
</div>
</div>

	@endforeach

@endif

@auth

<div class="card my-2">
<div class="card-header">
	<p>Add Comment</p>
</div>
<div class="card-body">
	<form method="POST" action="{{url('/posts/comment')}}">
		{{csrf_field()}}
	<textarea class="form-control" name="body"></textarea>
	<input type="hidden" name="id" value="{{$post->id}}">
	<input type="hidden" name="_method" value="POST">
	<input type="submit" class="btn btn-success my-3">
	</form>
</div>
</div>
@else

<h2 class="text-center pt-5">Sign In Or Register To See Comments</h2>

@endauth
@else

<h1 class="text-center py-5">There Are No Posts</h1>
@endif
@endsection

</section>