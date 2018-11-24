@extends('layouts.main')
@section('content')

<div class="text-center my-5">

<h1 class=" py-5">Do you Wante To Delete : {{$post->title}}</h1>

<form action="{{url('posts')}}/{{$post->id}}/edit" method="DELETE">
	<input type="hidden"  name="_method" value="delete">
	<input type="submit" class="btn btn-danger">
</form>
</div>

@endsection