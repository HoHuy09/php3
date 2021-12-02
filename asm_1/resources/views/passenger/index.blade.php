@extends('admin.layouts.main')
@section('content')
<table>
    <div class="card-body">
        <table class="table table-stripped">
    <thead>
        <th>STT</th>
        <th>Name</th>
        <th>Car_id</th>
        <th>Travel_time</th>
        <th>Avatar</th>
        <th>
            <a href="{{route('passenger.add')}}">Add new</a>
        </th>
    </thead>
    <tbody>
        
        @foreach ($passenger as $item) 
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->cars->plate_number}}</td>
                <td>{{$item->travel_time}}</td>
                <td><img src="{{asset($item->avatar)}}" width="100"></td>
                
                <td>
                    <a href="{{route('passenger.edit', ['id' => $item->id])}}">Edit</a>
                    <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{route('passenger.remove', ['id' => $item->id])}}">Remove</a>
                </td>
            </tr>
        @endforeach 
       
    </tbody>
</table>
@endsection

