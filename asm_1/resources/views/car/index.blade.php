@extends('admin.layouts.main')
@section('content')
<form class="row g-3">
    <div class="col-6">
      <label for="staticEmail2" class="visually-hidden">Từ khóa</label>
      <input type="text"  class="form-control-plaintext" name="keyword" id="staticEmail2" value="{{$searchData['keyword']}}" placeholder="Tìm theo biển số - owner - travel-fee">
    </div>
    
    
    <div class="col-6">
      <button style="margin-top: 50px" type="submit" class="btn btn-primary mb-3">Tìm kiếm</button>
    </div>
  </form>
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
                    <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{route('car.remove', ['id' => $item->id])}}">Remove</a>
                </td>
            </tr>
        @endforeach 
       
    </tbody>
</table>
@endsection
