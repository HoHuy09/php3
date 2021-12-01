@extends('admin.layouts.main')
@section('content')

<table>
    <div class="card-body">
        <table class="table table-stripped">
    <thead>
        <th>STT</th>
        <th>Name</th>
        <th>
            <a href="{{route('role.add')}}">Add</a>
        </th>
    </thead>
    <tbody>
        
        @foreach ($role as $item) 
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <a href="{{route('role.edit', ['id' => $item->id])}}">Edit</a>
                    <a href="{{route('role.remove', ['id' => $item->id])}}">Remove</a>
                </td>
            </tr>
        @endforeach 
       
    </tbody>
</table>
@endsection
