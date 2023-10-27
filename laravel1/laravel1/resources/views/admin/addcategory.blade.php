@extends('layouts.layout')
@section('addcategory')

<div class="container">
    <form action="{{route('category.store')}}" method="POST">
      @csrf
      <div class="mb-3 mt-5">
      <h1>Add Category</h1>
        <label htmlFor="name" class="form-label">
          Name
        </label>
        <input
          
          type="text"
          class="form-control"
          id="name"
          aria-describedby="name"
          name="name"
        />

       
      <button type="submit" class="btn btn-success mr-3">
        Create
      </button>
      <button onClick={handleCancel} class="btn btn-warning">
        Cancel
      </button>
    </form>
  </div>
@endsection