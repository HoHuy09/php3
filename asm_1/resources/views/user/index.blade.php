@extends('admin.layouts.main')
@section('content')

<table>
    <div class="card-body">
        <table class="table table-stripped">
    <thead>
        <th>STT</th>
        <th>Name</th>
        <th>Email</th>
        <th>Avatar</th>
        <th>Role_id</th>
        
        <th>
            Action
        </th>
    </thead>
    <tbody>
        
        @foreach ($user as $item) 
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td><img src="{{asset($item->avatar)}}" width="100"></td>
                <td>{{$item->roles->name}}</td>
                <td>
                    <a href="{{route('user.remove', ['id' => $item->id])}}">Remove</a>
                </td>
            </tr>
        @endforeach 
       
    </tbody>
</table>
@endsection
