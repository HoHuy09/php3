@extends('admin.layouts.main')
@section('content')
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="name" class="form-control" value="{{$model->name}}" placeholder="Nhập tên">
                </div>
                <div class="form-group">
                    <label for="">Chọn xe có biển số</label>
                    <select name="car_id" class="form-control">
                     @foreach ($car as $item)
                        <option @if($item->id == $model->car_id) selected @endif value="{{$item->id}}">{{$item->plate_number}}</option>
                    @endforeach
                    </select>
                    </div>
                <div class="form-group">
                    <label for="">Travel_time:</label>
                    <input type="date" name="travel_time" value="{{$model->travel_time}}" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Avatar:</label>
                    <input type="file" name="image" class="form-control" >
                    <img src="{{asset($model->avatar)}}" width="200px">
                </div>
                <br>    
            </div>
            
            <div class="col-12 d-flex justify-content">
                
                <a href="{{route('passenger.index')}}" class="btn btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </form>
</div>
@endsection

