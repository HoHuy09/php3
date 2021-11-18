<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label for="">Plate_number</label>
                  <input type="text" name="plate_number" class="form-control" placeholder="Nhập biển số">
                </div>
                <div class="form-group">
                    <label for="">Owner</label>
                    <input type="text" name="owner" class="form-control" placeholder="Chủ nhân">
                </div>
                <div class="form-group">
                    <label for="">Travel_fee:</label>
                    <input type="number" name="travel_fee" class="form-control" placeholder="giá">
                </div>
                
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