@extends('admin.layouts.main')
@section('content')

<table>
    <div class="card-body">
        <table class="table table-stripped">
    <thead>
        <th>STT</th>
        <th>Plate_number</th>
        <th>Owner</th>
        <th>Travel_fee</th>
        <th>Plate_Image</th>
        
        <th>
            <a href="{{route('car.add')}}">Add new</a>
        </th>
    </thead>
    <tbody>
        
        @foreach ($car as $item) 
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->plate_number}}</td>
                <td>{{$item->owner}}</td>
                <td>{{$item->travel_fee}}</td>
                <td><img src="{{asset($item->plate_image)}}" width="100"></td>
                
                <td>
                    <a href="{{route('car.edit', ['id' => $item->id])}}">Edit</a>
                    <a href="{{route('car.remove', ['id' => $item->id])}}">Remove</a>
                </td>
            </tr>
        @endforeach 
       
    </tbody>
</table>
@endsection
