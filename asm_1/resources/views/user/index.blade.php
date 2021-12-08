@extends('admin.layouts.main')
@section('content')
<form class="row g-3">
    <div class="col-6">
      <label for="staticEmail2" class="visually-hidden">Từ khóa</label>
      <input type="text"  class="form-control-plaintext" name="keyword" id="staticEmail2" value="{{$searchData['keyword']}}" placeholder="Tìm theo name - email">
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
        <th>Name</th>
        <th>Email</th>
        <th>Avatar</th>
        <th>Role_id</th>
        
        <th>
            <a href="{{route('user.add')}}">Add</a>
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
                    <a href="{{route('user.edit', ['id' => $item->id])}}">Edit</a>
                    <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{route('user.remove', ['id' => $item->id])}}">Remove</a>
                </td>
            </tr>
        @endforeach 
       
    </tbody>
</table>
@endsection
