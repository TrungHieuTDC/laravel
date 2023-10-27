@extends('layouts.layout')
@section('addcategory')

<div class="container">
    
    <form action="{{ route('category.update', ['category' => $category[0]->id_categories]) }}" method="POST">
        @csrf
        @method('PUT')
        <h1>Edit Cateory</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category[0]->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
  </div>
@endsection


