<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCarRequest;
use App\Models\Car;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    public function index(Request $request){
        $car = Car::all();
        
        return view('car.index',compact('car'));
    }
    public function addForm(){
        
        return view('car.add');
    }
    public function saveAdd(SaveCarRequest $request){
        $model = new Car();
        $model->fill($request->all());
        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('products');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->plate_image = $imgPath;
        }
        
        $model->save();
        return redirect(route('car.index'));
    }
    public function editForm($id){
        $model = Car::find($id) ;
        return view('car.edit',compact('model'));
    }
    public function saveEdit($id,Request $request){
        $model = Car::find($id);
        $model->fill($request->all());
        if($request->hasFile('image')){
            Storage::delete($model->image);

            $imgPath = $request->file('image')->store('products');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->plate_image = $imgPath;
        }
        $model->save();
        return redirect(route('car.index'));
    }
    public function remove($id){
        Car::destroy($id);
        Passenger::where('car_id', $id)->delete();
        return redirect(route('car.index'));
    }
}
