@extends('layouts.layout')
@section('addcategory')
<div class="container">
    <form action="/edit/author/{{$data[0]->id}}" method="post">
      @csrf
      <div class="mb-3 mt-5">
      <h1>Add Author</h1>
        <label htmlFor="name" class="form-label">
          Name
        </label>
        <input
          value="{{$data[0]->name}}"
          type="text"
          class="form-control"
          id="name"
          aria-describedby="name"
          name = "name"
        />

        <label htmlFor="name" class="form-label">
            Bio
          </label>
          <textarea  name="bio" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$data[0]->bio}}</textarea>
       
      <button type="submit" class="btn btn-success mr-3">
        Update
      </button>
    </form>
  </div>
@endsection