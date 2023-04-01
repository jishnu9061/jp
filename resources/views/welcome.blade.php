@extends('layouts.master')
@section('title','home')
@section('content')
    <h2>users</h2>
     @if(session()->has('message'))
     <p> {{ session()->get('message') }}</p>
     @endif
     <h1>Welcome {{ auth()->user()->name }}</h1>
    <a href="{{ route('create.user') }}" class="btn btn-primary" >New</a>
    <a href="{{ route('logout.user') }}" class="btn btn-danger" >Logout</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name{{ session()->get('date') }}</th>
            <th scope="col">Email</th>
            <th scope="col">Orders</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $data)
          <tr>
            <th scope="row">{{ $data->user_id}}</th>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->orders_count }}</td>
            <td>@if($data->trashed()) Trashed @else Active @endif</td>
            <td>
                <a href="{{ route('edit.user',encrypt($data->user_id)) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('view.user',encrypt($data->user_id)) }}" class="btn btn-warning">view</a>
                @if($data->trashed())<a href="{{ route('activate.user',encrypt($data->user_id)) }}" class="btn btn-success">Activate</a>@endif
                <a href="{{ route('force.user',encrypt($data->user_id)) }}" class="btn btn-danger">ForceDelete</a>
                <a href="{{ route('delete.user',encrypt($data->user_id)) }}" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div>
        {{ $users->links() }}
      </div>
@endsection
