<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePassengerRequest;
use App\Models\Car;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PassengersController extends Controller
{
    public function index(Request $request){
        $pageSize = 10;
       

        $keyword = $request->has('keyword') ? $request->keyword : "";
        $car_id = $request->has('car_id') ? $request->car_id : "";

        // dd($keyword, $cate_id, $rq_column_names, $rq_order_by);
       $query = Passenger::where('name', 'like', "%$keyword%");
       if(!empty($car_id )){
        $query->where('car_id', $car_id);
    }
        
        $passenger = $query->paginate($pageSize);
        // giữ lại các giá trị đang tìm kiếm trong link phần trang
        $passenger->appends($request->input());
        $car = Car::all();
        
        $searchData = compact('keyword','car_id');
        
        return view('passenger.index', compact('passenger','car', 'searchData'));
    }
    
    public function addForm(){
        $car = Car::all();
        return view('passenger.add',compact('car'));
    }
    public function saveAdd(SavePassengerRequest $request){
        $model = new Passenger();
        $model->fill($request->all());
        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('products');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
        
        $model->save();
        return redirect(route('passenger.index'));
    }
    public function editForm($id){
        $car = Car::all();
        $model = Passenger::find($id) ;
        
        return view('passenger.edit',compact('model','car'));
    }
    public function saveEdit($id,SavePassengerRequest $request){
        $model = Passenger::find($id);
        $model->fill($request->all());
        if($request->hasFile('image')){
            Storage::delete($model->image);

            $imgPath = $request->file('image')->store('products');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
       
        $model->save();
        return redirect(route('passenger.index'));
    }
    public function remove($id){
        Passenger::destroy($id);
        return redirect(route('passenger.index'));
    }
}
