@extends('layouts.master')
@section('title','New User')
@section('content')
<div class="container">
    <form action="{{ route('save.user') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
            @error('name')<p class="alert-danger">{{ $message }}</p>@enderror
          </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" name="email" class="form-control" id="email">
          @error('email')<p class="alert-danger">{{ $message }}</p>@enderror
        </div>
        <div class="form-group">
          <label for="dob">Date Of Birth:</label>
          <input type="text" name="dob" class="form-control">
          @error('dob')<p class="alert-danger">{{ $message }}</p>@enderror
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control">
        </div>
        <br>
        <div class="checkbox">
          <label> Status</label>
          <select class="form-control" name="status">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select> 
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
