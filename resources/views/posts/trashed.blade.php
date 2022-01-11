@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Posts trashed</h1>
            <a class="btn btn-info" href = "{{route('posts')}}">All Posts</a>
          </div>
      </div>

    </div>
    <div class="row">

    @if ($posts->count ()>0)
      <div class="col">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">User name</th>
                <th scope="col">Photo</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i= 1;
                @endphp
                @foreach ($posts as $item )
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>
                        <img

                        src="{{URL::asset($item->photo)}}"

                        alt="{{$item->photo}}"
                        class="omg-thumbnail" width="100" height="100" >
                    </td>
                    <td>
                        <a class="text-success" href = "{{route('post.restore', ['id'=> $item->id])}}"><i class="fas fa-2x fa-undo-alt"></i></i> </a>
                        <a class="text-danger" href = "{{route('post.hdelete', ['id'=> $item->id])}}"><i class="fas fa-2x fa-trash-alt"></i> </a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>

      @else
      <div class="coll">
      <div class="alert alert-danger" role="alert">
       Empty trash!
      </div>
      </div>

      @endif

    </div>
  </div>

  @endsection
