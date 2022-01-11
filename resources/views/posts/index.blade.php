@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4"> All Posts</h1>
            <a class="btn btn-info" href = "{{route('posts.create')}}">Create Post</a>
            <a class="btn btn-warning" href = "{{route('posts.trashed')}}">Post trashed</a>
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
                        {{-- method 1:
                        src="{{URL::asset($item->photo)}}"--}}
                        src ="{{$item->photo}}"
                        alt="{{$item->photo}}"
                        class="omg-thumbnail" width="100" height="100" >
                    </td>
                    <td>
                        <a class="text-success" href = "{{route('post.show', ['slug'=> $item->slug])}}"><i class="fas fa-2x fa-eye"></i> </a>
                        @if ($item->user_id== Auth::id())
                        &nbsp;&nbsp;
                        <a href = "{{route('post.edit', ['id'=> $item->id])}}"><i class="far fa-2x fa-edit"></i> </a>&nbsp;&nbsp;
                        <a class="text-warning" href = "{{route('post.destroy', ['id'=> $item->id])}}"><i class="fas fa-2x fa-trash"></i> </a>&nbsp;&nbsp;
                        <a class="text-danger" href = "{{route('post.hdelete', ['id'=> $item->id])}}"><i class="fas fa-2x fa-trash-alt"></i> </a>&nbsp;&nbsp;
                        @endif

                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>

      @else
      <div class="coll">
      <div class="alert alert-danger" role="alert">
       No Posts!
      </div>
      </div>

      @endif

    </div>
  </div>

  @endsection
