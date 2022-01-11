@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Create tag</h1>
            <a class="btn btn-info" href = "{{route('tags')}}">All tags</a>
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
        <form action="{{route('tag.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Tag</label>
              <input type="text" class="form-control" name="tag">
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
