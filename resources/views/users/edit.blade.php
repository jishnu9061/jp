@extends('layouts.master')
@section('title','New User')
@section('content')
<div class="container">
    <form action="{{ route('update.user') }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ encrypt($user->user_id) }}">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="name" name="name" class="form-control" id="name" value="{{ $user->name }}">
          </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
          <label for="dob">Date Of Birth:</label>
          <input type="text" name="dob" class="form-control" value="{{ $user->dob }}">
        </div>
        <br>
        <div class="checkbox">
          <label> Status</label>
          <select class="form-control" name="status" >
            <option value="1" @if($user->status == 1) selected="selected" @endif>Active</option>
            <option value="0" @if($user->status == 0) selected="selected" @endif>Inactive</option>
          </select> 
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
