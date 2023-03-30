@extends('layouts.master')
@section('title','New User')
@section('content')
<div class="container">
        <ul>
            <li>Name: {{ $user->name }}</li>
            <li>Email: {{ $user->email }}</li>
            <li>status: {{ $user->status_text }}</li>
            <li></li>
        </ul>  
        <ul>
            <li>Address Line :{{ $user->address->address_line_1 }}</li>
            <li>city :{{ $user->address->city }}</li>
            <li>state :{{ $user->address->state }}</li>
            <li>postcode :{{ $user->address->post_code }}</li>
        </ul>  
        <hr>
        @foreach($user->orders as $order)
        <ul>
            <li>{{ $order->order_id }}</li>
            <li>{{ $order->price }}</li>
            <li>{{ $order->status_text }}</li>
        </ul>
        @endforeach
</div>
@endsection
