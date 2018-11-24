@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" enctype="multipart/form-data" action="{{url('/post')}}">
                        {{csrf_field()}}
                        <p>Post Title :</p>
                        <input type="text" name="title" class="form-control mb-4">

                        <p>Post content :</p>
                        <textarea type="text" name="body" class="form-control mb-4"></textarea>

                        <p>Post Image :</p>
                        <input type="file" name="image">

                        <input type="submit" value="Add Post" class="btn btn-success d-block mt-4">
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
