@extends('layouts.layout')
@section('addarticle')
<a href="{{ route('article.create') }}" class="btn btn-primary">Add Article</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($article as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->title}}</td>
            <td>{{$item->content}}</td>
            <td>
                <a href="{{ route('article.edit', ['article' => $item->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('article.destroy', ['article' => $item->id]) }}" method="POST" style="display: inline-block;">
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