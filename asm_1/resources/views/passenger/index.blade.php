@extends('admin.layouts.main')
@section('content')
<table>
    <form class="row g-3">
        <div class="col-6">
          <label for="staticEmail2" class="visually-hidden">Từ khóa</label>
          <input type="text"  class="form-control-plaintext" name="keyword" id="staticEmail2" value="{{$searchData['keyword']}}" placeholder="Nhập Tên ...">
        </div>
        <div class="col-12">
            <label for="inputPassword2" class="visually-hidden">Car</label>
            <select name="car_id" class="form-select" aria-label="Default select example">
                <option value="">Tất cả</option>
                @foreach ($car as $item)
                <option @if($item->id == $searchData['car_id']) selected @endif value="{{$item->id}}">{{$item->plate_number}}</option>
            @endforeach
              </select>
        </div>
        <br>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-3">Tìm kiếm</button>
        </div>
      </form>
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

