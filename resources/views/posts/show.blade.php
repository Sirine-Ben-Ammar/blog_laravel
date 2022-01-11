@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Post Details</h1>
            <a class="btn btn-info" href = "{{route('posts')}}"> <- All Posts</a>
          </div>
          <div class="row">


            <div class="card" class="display-4">
                <img src="{{URL::asset($post->photo)}}" alt="{{$post->photo}}">
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <p class="card-text">{{$post->content}}</p>
                  <p>updated at:  {{$post->updated_at->diffForhumans()}} </p>
                  <p>created at:  {{$post->created_at->diffForhumans()}}</p>
                </div>
              </div>


          </div>
      </div>

    </div>
    </div>

@endsection
