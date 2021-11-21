<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    public function index(){
        $car = Car::all();
        return view('car.index',compact('car'));
    }
    public function addForm(){
        
        return view('car.add');
    }
    public function saveAdd(Request $request){
        $model = new Car();
        $model->fill($request->all());
        if($request->hasFile('image')){
            $oldImg = str_replace('storage/', 'public/', $model->image);
            Storage::delete($oldImg);

            $imgPath = $request->file('image')->store('public/products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
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
            $oldImg = str_replace('storage/', 'public/', $model->image);
            Storage::delete($oldImg);

            $imgPath = $request->file('image')->store('public/products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
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
