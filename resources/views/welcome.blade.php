@extends('layouts.main')
@section('content')


<div class="card-header">Posts</div>
        @foreach($posts as $post)
            <div class="card-body">
                 <div class="card">
                     <a class="card-header title-link" href="post/{{$post->id}}">{{$post->title}}</a>

                     <div class="card-body">                         
                         <div class="container-fluid">
                             <div class="row">
                                 <div class="col-6">
                                    @if($post->images->get(0))
                                     <img src="upload/{{$post->images->get(0)->url}}" class="mw-100 rounded image">
                                     @else
                                     <img src="images/1.jpg" class="w-100 rounded">
                                     @endif
                                 </div>
                                 <div class="col-6">
                                    <p>{{$post->body}}</p>
                                 </div>
                             </div>
                             

                         </div>
                     </div>
                </div>  
            </div>

        @endforeach

                
@endsection               