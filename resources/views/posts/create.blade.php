@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Create Post</h1>
            <a class="btn btn-info" href = "{{route('posts')}}">All Posts</a>
          </div>
      </div>

    </div>
    <div class="row">

     @if (count($errors)>0)
     <ul>
         @foreach ($errors->all() as $item)
            <li>
                {{$item}}
            </li>
         @endforeach
     </ul>
     @endif

      <div class="col">
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Title</label>
              <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
            @foreach ($tags as $item )
             <input type="checkbox" name="tags[]" value="{{$item->id}}">
             <label for="">{{$item->tag}}</label>
            @endforeach
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Content</label>
              <textarea class="form-control" rows="3" name="content"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Photo</label>
                <input type="file" class="form-control" name="photo">
              </div>

            <div class="form-group">
               <button class="btn btn-danger" type="submit">Save</button>
              </div>

          </form>
      </div>

    </div>
  </div>
</div>
@endsection
