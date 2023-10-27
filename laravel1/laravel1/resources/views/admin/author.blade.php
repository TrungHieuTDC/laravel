@extends('layouts.layout')
@section('addcategory')
<?php 
    use App\Http\Controllers\Author;
    $author = new Author();
 ?>
<a href="/formadd/author" class="btn btn-primary">Add Author</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Bio</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($author->getAllAuthor() as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->bio}}</td>
            <td>
                <a href="/formEdit/author/{{$item->id}}" class="btn btn-primary">Edit</a>
                <form action="/delete/author/{{$item->id}}" method="get" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
@endsection