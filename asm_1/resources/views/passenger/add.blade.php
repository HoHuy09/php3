@extends('admin.layouts.main')
@section('content')
<div class="container">
    <h3>ADD</h3>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Nhập tên">
                </div>
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="">Chọn xe có biển số</label>
                    <select name="car_id" class="form-control">
                     @foreach ($car as $item)
                        <option value="{{$item->id}}">{{$item->plate_number}}</option>
                    @endforeach
                    </select>
                    </div>
                <div class="form-group">
                    <label for="">Travel_time:</label>
                    <input type="date" name="travel_time" class="form-control" >
                </div>
                @error('travel_time')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="">Avatar:</label>
                    <input type="file" name="image" class="form-control" >
                </div>
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
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
