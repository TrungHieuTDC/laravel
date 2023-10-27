@extends('layouts.layout')
@section('addarticle')
<?php
use App\Http\Controllers\Author;

$author = new Author();

?>
<div class="container">
    <form action="{{route('article.store')}}" enctype="multipart/form-data" method="POST">
      @csrf
      <div class="mb-3 mt-5">
      <h1>Add Article</h1>
      <div class="mb-3">
        <label for="exampleFormControlInput1"  class="form-label">Name</label>
        <input type="text" class="form-control" name="title" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
      </div>
      <div className="form-group">
        <label for="photo">Attach a photograph</label>
        <input
          type="file"
          name="img"
          id="photo"
          class='form-control-file'
          required
        />
        
      </div>
    </div>
      <select name="category_id" class="form-select" aria-label="Default select example">
        <option selected>Open this select category</option>
        @foreach ($categories as $item)
            <option value="{{$item->id_categories}}">{{$item->name}}</option>
        @endforeach
      </select>
      <br>
      <select name="id_author" class="form-select" aria-label="Default select example">
        <option selected>Open this select author</option>
        @foreach ($author->getAllAuthor() as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-success mr-3">
        Create
      </button>
      <button class="btn btn-warning">
        Cancel
      </button>
    </form>
  </div>
@endsection