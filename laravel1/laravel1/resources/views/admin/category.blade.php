@extends('layouts.layout')
@section('addcategory')
<a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($category as $item)
        <tr>
            <th scope="row">{{$item->id_categories}}</th>
            <td>{{$item->name}}</td>
            <td>
                <a href="{{ route('category.edit', ['category' => $item->id_categories]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('category.destroy', ['category' => $item->id_categories]) }}" method="POST" style="display: inline-block;">
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