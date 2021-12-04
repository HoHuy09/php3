@extends('admin.layouts.main')
@section('content')

<div class="container">
    <h3>ADD</h3>
    <form action="" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label for="">Plate_number</label>
                  <input type="text" name="plate_number"  class="form-control" placeholder="Nhập biển số">
                </div>
                @error('plate_number')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="">Owner</label>
                    <input type="text" name="owner" class="form-control" placeholder="Chủ nhân">
                </div>
                @error('owner')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="">Travel_fee:</label>
                    <input type="number" name="travel_fee" class="form-control" placeholder="giá">
                </div>
                @error('travel_fee')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="">Plate_Image:</label>
                    <input type="file" name="image" class="form-control" >
                </div>
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <br>    
            </div>
            
            <div class="col-12 d-flex justify-content">
                
                <a href="{{route('car.index')}}" class="btn btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </form>
</div>
@endsection

